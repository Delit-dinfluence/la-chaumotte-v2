<?php

namespace Core\Controller\Traits;

use App\Entity\PageGeneral;
use Core\Entity\Configuration;
use Core\Entity\CookieConfiguration;
use Core\Entity\Design;
use Core\Entity\DesignThemeType;
use Core\Entity\HistoryMessageType;
use Core\Entity\Image;
use Core\Entity\Language;
use Core\Entity\MediaFile;
use Core\Entity\Page;
use Core\Entity\Redirection;
use Core\Entity\Text;
use Core\Service\FileReaderWriter\FileReaderWriter;
use Core\Service\History\HistoryMessage;
use Core\Service\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use User\Entity\AuthorizationGroup;
use User\Entity\AuthorizationType;
use User\Entity\User;
use User\Entity\UserGroup;
use User\Service\UserManager;

trait BaseController
{
    /**
     * @var array - Tableau de variables utilisé pours les templates
     */
    protected $vars = [];

    /**
     * @var Session - Gère l'enregistrement en Session (Session - Database - File) des données
     */
    protected $session;

    /**
     * @var HistoryMessage - Gère l'historique des actions et des évènements
     */
    protected $history;

    /**
     * @var User - Utilisation courant
     */
    protected $user;

    /**
     * @var array UserGroup - Groupes de l'utilisateur courant
     */
    protected $user_groups;

    /**
     * @var array UserAuthorization - Authorization de l'utilisateur courant
     */
    protected $user_authorizations;


    /**
     * @var
     */
    protected $writer;

    /**
     * Constructeur
     */
    public function __construct(Session $session, HistoryMessage $history, FileReaderWriter $writer)
    {
        $this->session = $session;
        $this->history = $history;
        $this->writer = $writer;
    }

    /**
     * Initialisation des variables
     */
    public function initializeController(Request $request)
    {

        // Désactivation des logs de Doctrine
        $this->getDoctrine()->getEntityManager()->getConnection()->getConfiguration()->setSQLLogger(null);

        // Configuration générale de l'application
        $this->vars['configuration'] = $this->getDoctrine()->getRepository(Configuration::class)->findWhere('entity.id = 1', 1);

        // Configuration de la gestion des cookies
        $this->vars['cookie_configuration'] = $cookie_configuration = $this->getDoctrine()->getRepository(CookieConfiguration::class)->find(1);

        // Choix du template et des configurations graphiques à utiliser
        $this->vars['design'] = $design = $this->getDoctrine()->getRepository(Design::class)->findWhere('entity.id = 1', 1);

        // Attributions des différentes langues de l'application
        $this->setLanguages($request);

        // Initialisation de la configuration utilisateur
        $this->setUserSettings($request);

        // Définitions du controller à utiliser
        $this->vars['controller'] = $controller = $this->findRoute($request);
    }

    /**
     * Initialisation des paramètres de langues
     */
    public function setLanguages(Request $request)
    {
        // On récupère les différentes langues
        $this->vars['languages'] = $this->getDoctrine()->getRepository(Language::class)->findBy(['is_enabled' => 1]);

        // Définition des variables mémoires URL
        $this->vars['host'] = $host = $request->headers->get('host');
        $this->vars['uri'] = $uri = $request->attributes->get('controller');

        if ($_ENV['APP_ENV'] == 'dev') {
            $this->vars['protocole'] = $protocole = '';
        } else {
            $this->vars['protocole'] = $protocole = 'https://';
        }

        $this->vars['uri_full'] = $protocole . $host . $request->getRequestUri();

        // Langue via le navigateur
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $use_language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        } else {
            $use_language = 'fr';
        }
        // Surcharge - Langue via la session
        if ($this->session->has('_locale')) {
            $use_language = $this->session->get('_locale');
        }

        // Surcharge - Langue via l'URL
        if (preg_match('#^/[a-z]{2}/#', '/' . $uri, $matches) || preg_match('#^/[a-z]{2}$#', '/' . $uri, $matches)) {
            $use_language = trim($matches[0], '/');
        }


        // Langues disponibles via le code ISO
        foreach ($this->vars['languages'] as $language) {
            if ($language->getIsoCode() == $use_language) {
                $locale = $use_language;
                break;
            }
        }

        // Langues par defaut
        if (!isset($locale)) {
            $locale = 'fr';
        }

        // Sauvegarde des variables de langues
        $this->session->set('_locale', $locale); // Sauvegarde en session
        $request->setLocale($locale); // Sauvegarde en request
        $this->vars['locale'] = $request->getLocale();  // Sauvegarde en variable

        // Définitions des traductions utilisées par l'application
        $translations = $this->getDoctrine()->getRepository(Text::class)->findWhere('entity.is_enabled = 1');
        $this->setTranslations($translations);

        // TODO - Utiliser setTranslations uniquement sur les textes de la page courante pour améliorer les performances
    }

    /**
     * Ajoute les traductions aux traductions disponibles à la vue
     */
    public function setTranslations($translations)
    {
        foreach ($translations as $translation) {
            if ($translation->getIsEnabled()) {
                $reference = strtolower($translation->getReference());
                $value = $translation->translate($this->vars['locale'])->getValue();
                $this->vars['translation'][$reference] = $value;
            }
        }
    }

    /**
     * Router - Redirige vers le controller adéquate
     */
    public function findRoute(Request $request)
    {
        // Redirection s'il manque la langue dans l'URL
        if (count($this->vars['languages']) > 1) {
            if (!preg_match('#^/[a-z]{2}/#', '/' . $this->vars['uri'], $matches) && !preg_match('#^/[a-z]{2}$#', '/' . $this->vars['uri'], $matches)) {
                return $this->redirect('http://' . $this->vars['host'] . '/' . $this->vars['locale'] . '/' . $this->vars['uri'], 302);
            }
        }

        $object = $this->setPages();

        // Attribution de l'URL spécifique à la langue utilisée
        $router = [];
        foreach ($object['pages'] as $key => $page) {
            if ($page != null) {
                $router[] = [
                    'page' => $page,
                    'controller_uri' => $page->translate($this->vars['locale'])->getUri(),
                    'controller_module' => $object['pages_list'][$key]->getControllerModule(),
                    'controller_entity' => $object['pages_list'][$key]->getControllerEntity(),
                    'controller' => $object['pages_list'][$key]->getController(),
                ];
            }
        }


        // Recherche d'une correspondance dans le tableau des redirections
        $this->vars['redirection'] = $redirection = $this->getDoctrine()->getRepository(Redirection::class)->findOneBy([
            'uri_from' => '/' . $this->vars['uri']
        ]);

        if ($redirection != null) {

            switch ($redirection->getType()) {
                case '1':
                    $redirection_type = 302;
                    break;

                case '2':
                    $redirection_type = 301;
                    break;

                case '0':
                default:
                    $redirection_type = 404;
                    break;
            }

            if ($redirection_type == 404) {
                return $this->redirect($this->vars['pages']['error404']->translate($this->vars['locale'])->getUri(), 301);
            } else {
                return $this->redirect($this->vars['redirection']->getUriTo(), $redirection_type);
            }
        }

        // Parcours des différentes routes pour trouver une correspondance
        foreach ($router as $key => $route) {

            $controller_uri = strstr($route['controller_uri'], '?', true);

            if (!$controller_uri) {
                $controller_uri = $route['controller_uri'];
            }

            if (count($this->vars['languages']) > 1) {
                if (preg_match('#^\/[a-z]{2}' . $controller_uri . '$#', '/' . $this->vars['uri'])) {
                    $this->vars['page'] = $route['page']; // Mémorisation de la page active
                    $controller = $route['controller_module'] . '\Controller\\' . $route['controller'];
                    $method = str_replace('page', '', strtolower($route['controller_entity']));

                    return $controller . '::' . $method;
                }
            } else {

                if (preg_match('#^' . $controller_uri . '$#', '/' . $this->vars['uri'])) {
                    $this->vars['page'] = $route['page']; // Mémorisation de la page active
                    $controller = $route['controller_module'] . '\Controller\\' . $route['controller'];
                    $method = str_replace('page', '', strtolower($route['controller_entity']));
                    return $controller . '::' . $method;
                }
            }

        }


        // Recherche d'une URL personnalisée
        return 'Core\Controller\PageController::custom_url';
    }


    public function setPages()
    {

        // On récupère la liste des pages actives accessibles
        $pages_list = $this->getDoctrine()->getRepository(Page::class)->findBy(['is_enabled' => true]);

        // On récupère la configuration spécifique de chaque page
        $pages = [];
        foreach ($pages_list as $page) {
            $class = $page->getControllerModule() . '\Entity\\' . $page->getControllerEntity();
            $pages[] = $this->getDoctrine()->getRepository($class)->find(1);
        }

        // Passage des pages à la vue
        foreach ($pages as $key => $page) {

            // Mémorisation de la page générale
            if ($page != null && $page->getId() == 1) {
                $this->vars['general'] = $page;
            }

            $this->vars['pages'][str_replace('_page_', '', strtolower(implode('_', preg_split('/(?=[A-Z])/', $pages_list[$key]->getControllerEntity()))))] = $page;
        }

        return [
            'pages_list' => $pages_list,
            'pages' => $pages
        ];
    }

    /**
     * Gestion de la configuration de la page
     */
    public function setPageSettings(Request $request, $page_name)
    {
        $page = $this->vars['page'];
        $general = $this->vars['general'];

        // TODO - Améliorer le système des langues par pages
        // Liste des URL par langue
        $uris = [];
        foreach ($this->vars['languages'] as $language) {
            $uris = array_merge($uris, [
                $language->getIsoCode() => $page->translate($language->getIsoCode())->getUri()
            ]);
        }

        $this->vars['current_page'] = $uris;

        // Paramètre spécifique à la page
        $seo_title = $page->getSeoTitle();
        $seo_description = $page->getSeoDescription();
        $seo_keywords = $page->getSeoKeywords();
        $sn_title = $page->getSnTitle();
        $sn_description = $page->getSnDescription();
        $sn_image_twitter = $page->getTwitter();
        $sn_image_social_networks = $page->getFacebook();

        // Recoupement avec les paramètres par defaut de l'application
        if ($seo_title == null) $seo_title = $general->getSeoTitle();
        if ($seo_description == null) $seo_description = $general->getSeoDescription();
        if ($seo_keywords == null) $seo_keywords = $general->getSeoKeywords();
        if ($sn_title == null) $sn_title = $general->getSnTitle();
        if ($sn_description == null) $sn_description = $general->getSnDescription();
        if ($sn_image_twitter == null) $sn_image_twitter = $general->getTwitter();
        if ($sn_image_social_networks == null) $sn_image_social_networks = $general->getFacebook();

        if ($sn_image_social_networks == null) $sn_image_social_networks = $general->getFacebook();

        // Restitution des paramètres à la vue
        $this->vars['seo']['title'] = $seo_title;
        $this->vars['seo']['description'] = $seo_description;
        $this->vars['seo']['keywords'] = $seo_keywords;

        $this->vars['sn']['title'] = $sn_title;
        $this->vars['sn']['description'] = $sn_description;
        $this->vars['sn']['image_twitter'] = $sn_image_twitter;
        $this->vars['sn']['image_social_networks'] = $sn_image_social_networks;

        $this->vars['website']['domain'] = $this->vars['configuration']->getDomain();
        $this->vars['website']['name'] = $this->vars['configuration']->getSitename();
        $this->vars['website']['current_uri'] = '';

        $this->vars['uris'] = [];

        $this->vars['page_indexable'] = $page->getIsIndexable();


        // On récupère la liste des images de l'application
        $images = $this->getDoctrine()->getRepository(Image::class)->findAll();
        if ($images != null) {
            foreach ($images as $image) {
                $this->vars['images'][$image->getReference()] = $image;
            }
        } else {
            $images = [];
        }


        // On récupère la liste des fichiers de l'application
        $files = $this->getDoctrine()->getRepository(MediaFile::class)->findAll();
        if ($files != null) {
            foreach ($files as $file) {
                $this->vars['files'][$file->getReference()] = $file;
            }
        } else {
            $files = [];
        }
    }

    /**
     * Gestion de la configuration utilisateur
     */
    public function setUserSettings(Request $request)
    {
        // Manager d'utilisateur
        $entity = new UserManager($this->getDoctrine());

        // Création d'un utilisateur fantome
        $this->user = new User();

        // Récupération de l'utilisateur en session
        $session_content = $this->session->get('user');

        if ($session_content != null) {

            // Format du contenu
            $this->user->unserialize($session_content);

            // Vérification en base de donnée de l'existance de l'utilisateur
            $this->user = $this->getDoctrine()->getRepository(User::class)->findByUser($this->user);
        }

        // Sinon création d'un visiteur si echec de récupération de l'utilisateur
        if ($session_content == null || $this->user == null || !$entity->checkUser($this->user)) {
            $this->user = $entity->createUser();
        }
        // Autorisations de l'utilisateurs par groupe
        foreach ($this->user->getUserGroups()->toArray() as $group) {

            // On récupère les authorizations du groupe
            $authorizations = $this->getDoctrine()->getRepository(AuthorizationGroup::class)->findWhere('entity.team = ' . $group->getId());

            // Attribution des authorisations par clés
            foreach ($authorizations as $authorization) {
                $this->user_authorizations[$authorization->getAuthorization()->getDevKey()][] = $authorization;
            }

            if ($this->checkAuthorization($request, [
                'authorization' => 'administration',
                'type' => 0
            ])) {
                $this->vars['account']['admin'] = true;
            }
        }


        // Définitions de la variable utilisateur
        $this->vars['account']['user'] = $this->user;
        $this->vars['account']['customer'] = $this->user->getCustomer();
    }

    /**
     * Vérification de l'autorisation de connexion à l'application
     */
    public function checkAuthorization(Request $request, $params = null)
    {
        // Connexion autorisé par compte
        if ($params != null && array_key_exists('authorization', $params) && array_key_exists('type', $params)) {


            // Abscence de la clé d'authorization des authorizations
            if (!is_array($this->user_authorizations) || !array_key_exists($params['authorization'], $this->user_authorizations)) {

                // TODO Supprimer cette condition pour accroite la sécurité lors de la création de groupe

                // Vérification absente - Accès authorisé
                return false;
            }

            // On récupère la clé d'authorization à vérifier
            $groups = $this->user_authorizations[$params['authorization']];


            // Vérification des authorization pour cette clé
            foreach ($groups as $group) {
                if (($params['type'] == AuthorizationType::VIEW && $group->getEnableView()) ||
                    ($params['type'] == AuthorizationType::EDIT && $group->getEnableEdit()) ||
                    ($params['type'] == AuthorizationType::NEW && $group->getEnableAdd()) ||
                    ($params['type'] == AuthorizationType::FORM && ($group->getEnableAdd() || $group->getEnableEdit())) ||
                    ($params['type'] == AuthorizationType::REMOVE && $group->getEnableDelete())) {

                    // Vérification réussie - Accès authorisé
                    return true;
                }
            }
        }

        // Accès refusé
        return false;
    }

    public function findCurrentIp(Request $request)
    {
        return $request->getClientIp();
    }

    /**
     *  Retourne le template adequate
     */
    public function generateTemplate($path, $vars = [], $json = false)
    {
        // Ajoute l'extension si elle n'existe pas
        if (!strpos($path, '.html.twig')) {
            $path = $path . '.html.twig';
        }

        // Mise en place du thème
//        $path = str_replace('/theme/', '/theme/' . DesignThemeType::getKeyName($this->vars['design']->getTheme()) . '/', $path);
        $path = str_replace('/theme/', '/theme/basique/', $path);

        if (!$json) {

            // On récupère le chemin complet du potentielle template
            $file = $this->getParameter('file_templates') . str_replace('@', '', $path);

            // Si le fichier de redéfinition n'existe pas "list" / "form" / "view" utilise le fichier par default (Ex: entity_list.html.twig)
            if (!file_exists($file)) {
//                $theme = '@core/admin/theme/' . DesignThemeType::getKeyName($this->vars['design']->getTheme());
                $theme = '@core/admin/theme/basique';
                if (preg_match("#(.)+_list.html.twig#", $path)) {
                    $path = $theme . '/entity_list.html.twig';
                } else if (preg_match("#(.)+_form.html.twig#", $path)) {
                    $path = $theme . '/entity_form.html.twig';
                } else if (preg_match("#(.)+_view.html.twig#", $path)) {
                    $path = $theme . '/entity_view.html.twig';
                }
            }

            // Retourne le template généré
            return $this->render($path, array_merge($this->vars, $vars));

        } else {

            // Retourne le template pouvant être rendu en json
            return $this->renderView($path, array_merge($this->vars, $vars));
        }
    }

}
