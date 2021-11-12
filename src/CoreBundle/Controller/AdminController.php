<?php

namespace Core\Controller;


use Core\Controller\Traits\BaseAdminController;
use Core\Controller\Traits\BaseController;
use Core\Entity\ComingSoonConfiguration;
use Core\Entity\Configuration;
use Core\Entity\CookieConfiguration;
use Core\Entity\Design;
use Core\Entity\FileFormat;
use Core\Entity\Gallery;
use Core\Entity\GoogleMapConfiguration;
use Core\Entity\History;
use Core\Entity\HistoryGravityType;
use Core\Entity\MaintenanceConfiguration;
use Core\Entity\Text;
use Core\Entity\TextGroup;
use Core\Entity\Versioning;
use Core\Form\ComingSoonConfigurationType;
use Core\Form\ConfigurationType;
use Core\Form\CookieConfigurationType;
use Core\Form\DesignType;
use Core\Form\GoogleMapConfigurationType;
use Core\Form\MaintenanceConfigurationType;
use Core\Form\TextType;
use Core\Service\FileReaderWriter\FileReaderWriter;
use Core\Service\History\HistoryMessage;
use Core\Service\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

/**
 * Controller de l'espace d'administration
 *
 * @Route("/4DM1n157R4710N", name="core_admin_")
 */
class AdminController extends AbstractController
{
    use BaseController;
    use BaseAdminController;

    /**
     * Nom du bundle
     */
    protected $bundle_name = 'core';

    /**
     * @Route("/", name="dashboard")
     */
    public function dashboard()
    {
        $useRedirection = true;

        // Utilise une redirection à la place du Dashboard
        if ($useRedirection) {
            return $this->redirect('/4DM1n157R4710N/entity-management?module=shopping&entity=Order&action=list');

        } else {

            return $this->generateTemplate('@core/admin/theme/dashboard');
        }

    }

    /**
     * Surcharge "Information" - Formulaire de "choix des modules et d'informations" de l'application
     */
    public function information_form(Request $request)
    {
        $git = Versioning::getInstance();

        // On récupère l'environement de développement
        $debug = getenv('APP_ENV');
        ($debug == 'prod' ? $debug = 'Production' : $debug = 'Développement');

        return $this->generateTemplate($this->vars['template'], [
            'versioning' => [
                'version' => $git->getVersion(),
                'maj_last_date' => $git->getCommitLastDate(),
                'maj_last_object' => $git->getCommitLastObject()
            ],
            'environment' => [
                'debug' => $debug
            ]
        ]);
    }

    /**
     * Surcharge "Configuration" - Gestion des différents onglets de configuration de l'application
     */
    public function configuration_form(Request $request)
    {

        try {
            $files = $this->getDoctrine()->getRepository(FileFormat::class)->findAll();
            $cookies = $this->generateEntityForm($request, CookieConfiguration::class, CookieConfigurationType::class, 1);
            $google = $this->generateEntityForm($request, GoogleMapConfiguration::class, GoogleMapConfigurationType::class, 1);

            $configuration = $this->generateEntityForm($request, Configuration::class, ConfigurationType::class, 1);
            $maintenance = $this->generateEntityForm($request, MaintenanceConfiguration::class, MaintenanceConfigurationType::class, 1);
            $coming_soon = $this->generateEntityForm($request, ComingSoonConfiguration::class, ComingSoonConfigurationType::class, 1);


            return $this->generateTemplate($this->vars['template'], [
                'files_settings' => $this->configuration_from_file['file_format'],
                'files' => $files,
                'file' => new FileFormat(),

                'configuration_settings' => $this->configuration_from_file['configuration'],
                'form_configuration' => $configuration->createView(),
                'configuration' => new Configuration(),

                'cookie_settings' => $this->configuration_from_file['cookie_configuration'],
                'form_cookie' => $cookies->createView(),
                'cookie' => new CookieConfiguration(),

                'google_settings' => $this->configuration_from_file['google_configuration'],
                'form_google' => $google->createView(),
                'google' => new GoogleMapConfiguration(),

                'maintenance_settings' => $this->configuration_from_file['maintenance_configuration'],
                'form_maintenance' => $maintenance->createView(),
                'maintenance' => new MaintenanceConfiguration(),

                'coming_soon_settings' => $this->configuration_from_file['coming_soon_configuration'],
                'form_coming_soon' => $coming_soon->createView(),
                'coming_soon' => new ComingSoonConfiguration(),

            ]);
        } catch (\Exception $e) {
            dump($e);
            die();
        }

    }

    /**
     * Page personnalisée - Page de recherche de la partie Administration
     *
     * @Route("/search", name="search")
     */
    public function search()
    {

        return $this->generateTemplate('@core/admin/theme/search', []);
    }

    /**
     * Page personnalisée - Page d'accueil des traductions
     *
     * @Route("/translation", name="translation_list")
     */
    public function translation_list()
    {
        $this->vars['groups'] = $this->getDoctrine()->getRepository(TextGroup::class)->findWhere('entity.parent is null');
        $this->vars['expressions'] = $count_expression = $this->getDoctrine()->getRepository(Text::class)->countExpression();
        $count_all = $this->getDoctrine()->getRepository(Text::class)->countAll();
        $this->vars['percentage'] = $count_all * 100 / ($count_expression * count($this->vars['languages']));

        return $this->generateTemplate('@core/admin/theme/translation_list', []);
    }

    /**
     * Requête AJAX - Récupère le formulaire d'une traduction
     *
     * @Route("/ajax/translation/form", name="translation_form")
     */
    public function translation_form(Request $request)
    {
        $output = [];
        $code = -1;
        $errors = [];

        $category = $request->request->get('category');
        $object = $this->getDoctrine()->getRepository(TextGroup::class)->findWhere('entity.id = ' . $category, 1);
        $output['category'] = $object->getDesignation();
        $output['category_id'] = $object->getId();

        $breadrcumb = [$object->getDesignation()];
        $parent = $object->getParent();
        $cpt = 1;
        while ($object->getParent() != null && $cpt < 10) {
            $breadcrumb[] = $parent->getDesignation();
            $object = $parent;
            $cpt++;
        }
        $breadrcumb[] = $object->getDesignation();


        $objects = $this->getDoctrine()->getRepository(Text::class)->findWhere('entity.text_group = ' . $category);

        $output['texts'] = [];
        foreach ($objects as $item) {

            if ($item->getIsEnabled()) {

                $form = $this->generateEntityForm($request, Text::class, TextType::class, $item->getId());
                $output['texts'][] = $this->generateTemplate('@core/admin/theme/translation_form', [
                    'text' => $item,
                    'form' => $form->createView(),
                    'breadcrumb' => $breadrcumb,

                ],
                    true);
            }
        }


        $arrData = ['output' => $output, 'errors' => $errors, 'code' => $code];
        return new JsonResponse($arrData);
    }

    /**
     * Requête AJAX -  Sauvegarde une traduction
     *
     * @Route("/ajax/translation/save", name="translation_save")
     */
    public function translation_save(Request $request)
    {
        $output = [];
        $code = -1;
        $errors = [];

        $category = $request->query->get('category');
        $id = $request->query->get('entity');


        $entity = $this->getDoctrine()->getRepository(Text::class)->findWhere('entity.id = ' . $id, 1);
        $form = $this->createForm(TextType::class, $entity);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);
            $entity->mergeNewTranslations();
            $em->flush();
            $code = 200;

        }

        $arrData = ['output' => $output, 'errors' => $errors, 'code' => $code];
        return new JsonResponse($arrData);
    }


    /**
     * Requête AJAX - Sauvegarde de la configuration des cookies (AddThis, Google Analytics, ReCAPTCHA, ...)
     *
     * @Route("/ajax/cookie/save", name="cookie_save")
     */
    public function cookie_save(Request $request)
    {
        $informations = [
            'google_analytics' => $request->query->get('google_analytics'),
            'add_this' => $request->query->get('add_this'),
            'pixel_facebook' => $request->query->get('pixel_facebook'),
            'recaptcha_client' => $request->query->get('recaptcha_client'),
            'recaptcha_server' => $request->query->get('recaptcha_server'),
            'recaptcha_hostname' => $request->query->get('recaptcha_hostname'),
        ];

        $configuration = $this->getDoctrine()->getRepository(CookieConfiguration::class)->find(1);

        $configuration->setGoogleAnalytics($informations['google_analytics']);
        $configuration->setAddThis($informations['add_this']);
        $configuration->setPixelFacebook($informations['pixel_facebook']);
        $configuration->setRecaptchaClient($informations['recaptcha_client']);
        $configuration->setRecaptchaServer($informations['recaptcha_server']);
        $configuration->setRecaptchaHostname($informations['recaptcha_hostname']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($configuration);
        $em->flush();

        return new JsonResponse('', 200);
    }

    /**
     * Requête AJAX - Sauvegarde de la GoogleMap Principale de l'application
     *
     * @Route("/ajax/google-map/save", name="google_map_save")
     */
    public function google_map_save(Request $request)
    {
        $informations = [
            'api_key' => $request->query->get('api_key'),
            'zoom' => $request->query->get('zoom'),
            'latitude' => $request->query->get('latitude'),
            'longitude' => $request->query->get('longitude'),
        ];

        $configuration = $this->getDoctrine()->getRepository(GoogleMapConfiguration::class)->find(1);

        $configuration->setApiKey($informations['api_key']);
        $configuration->setZoom($informations['zoom']);
        $configuration->setLatitude($informations['latitude']);
        $configuration->setLongitude($informations['longitude']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($configuration);
        $em->flush();

        return new JsonResponse('', 200);
    }

}
