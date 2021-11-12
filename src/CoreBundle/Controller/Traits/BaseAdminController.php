<?php

namespace Core\Controller\Traits;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Core\Entity\DesignThemeType;
use Core\Entity\HistoryMessageType;
use Core\Entity\Image;
use Core\Entity\Information;
use Shopping\Service\Product\Product;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;
use User\Entity\AuthorizationType;

trait BaseAdminController
{
//    protected $bundle_name = '';

    protected $configuration_from_file;

    /**
     * Initialisation des variables du controller
     */
    public function initializeAdminController(Request $request)
    {
        $information = $this->getDoctrine()->getRepository(Information::class)->findWhere('entity.id = 1', 1);
        $this->vars['authorized_modules'] = $information->getAuthorizedModules();

        $this->vars['admin_settings'] = $this->getConfigurationFromFile('config');

        $this->vars['links']['return'] = $request->headers->get('referer');

        // Surcharge de controller
        $vars = $request->request->get('vars');
        if ($vars != null) {
            $this->vars = array_merge($this->vars, $vars);
        }

        if ($this->bundle_name != '') {
            $this->configuration_from_file = $this->getConfigurationFromFile($this->bundle_name);
        }

        $images = $this->getDoctrine()->getRepository(Image::class)->findWhere('entity.id > 0');
        if ($images != null) {
            foreach ($images as $image) {
                $this->vars['images'][$image->getReference()] = $image;
            }
        } else {
            $images = [];
        }
    }

    /**
     * Retourne le fichier de configuration du Bundle
     */
    public function getConfigurationFromFile($module, $entity = null)
    {
        // Récupère le fichier de configuration
//        $path = $this->getParameter('kernel.project_dir') . '/config/admin/theme/' . DesignThemeType::getKeyName($this->vars['design']->getTheme()) . '/' . $module . '.yaml';
        $path = $this->getParameter('kernel.project_dir') . '/config/admin/theme/basique/' . $module . '.yaml';
        $content = Yaml::parseFile($path);

        // Set toutes les données du bundle
        $this->vars['admin_entities_settings'] = $content;

        // Set les données de l'entitée en cours
        if ($entity != null) {
            if (key_exists($entity, $content)) {
                $this->vars['admin_entity_settings'] = $content[$entity];
            } else {
                throw new \Exception('La clé "' . $entity . '" n\'existe pas dans le fichier de configuration : "' . $path . '"');
            }
        }

        return $content;
    }

    /**
     * Génère automatiquement les vues pour une entitée (list, form, view)
     *
     * Exemple des attributions de variables:
     * module = app|core|shopping ...
     * property = group|categories... Nom de la propiété du groupe des entitées à afficher
     * entity_default = ProductVariation|Product...
     * entity = product_variation|product...
     * action = list|form
     * id = -1|10
     * alternative = form
     *
     * @Route("/entity-management", name="controller_entity_auto")
     */
    public function actionEntityAuto(Request $request)
    {
        $this->vars['module'] = $module = strtolower($request->query->get('module'));
        $this->vars['action'] = $action = strtolower($request->query->get('action'));
        $this->vars['id'] = $entity_id = $request->query->get('id');
        $this->vars['alternative'] = $alternative = $request->query->get('alternative');
        $this->vars['enable'] = $enable = $request->query->get('enable');
        $this->vars['property'] = $property = strtolower($request->query->get('property'));
        $this->vars['entity_default'] = $entity_default = $request->query->get('entity');


        // Remplace le nom d'entité "alice_bob" par "AliceBob"
        $this->vars['entity'] = $entity = implode('', array_map(function ($item) {
            return ucfirst($item);
        }, explode('_', $entity_default)));

        // Class de l'entité
        $class = ucfirst($module) . '\Entity\\' . $entity;

        // Récupère la configuration de l'entité
        $config_entity = preg_replace('/([A-Z])/', '_$1', lcfirst($entity));
        $config_entity = strtolower(str_replace($module . '_', '', $config_entity));
        $content = $this->getConfigurationFromFile($module, $config_entity);

        // Template de l'entité
        $template_entity = str_replace($module, '', strtolower($config_entity)); // Template de l'entité
        if ($template_entity == '') {
            $template_entity = strtolower($entity);
        }

        if ($action == 'list') {

//            if (!$this->isAuthorized($config_entity, AuthorizationType::VIEW)) {
//                return $this->redirectToRoute('core_admin_dashboard');
//            }

            // Override du template spécifique de la liste de l'entité
            $this->vars['template'] = $template = '@' . $module . '/admin/theme/' . $template_entity . '_list';
            // Utilise une condition pour afficher uniquement certaines entitées
            $condition = null;
            if ($entity_id != null && $property != null) {
                $condition = [
                    'property' => $property,
                    'id' => $entity_id
                ];
            }
            // Remplace "PageProductPariation" par "product_variation"
            $method = trim(str_replace('page', '', strtolower(implode('_', preg_split('/(?=[A-Z])/', $entity)))), '_');

            // Appel de controller spécifique
            $request->request->set('vars', $this->vars);
            $response = $this->forward(ucfirst($module) . '\Controller\AdminController::' . $method . '_list');

            // Appel du controller par défaut si le controller spécifique n'existe pas
            if ($response->getStatusCode() != 200) {

                $response = $this->generateTemplate($template, [
                    'entities' => $this->actionEntityList($class, $condition),
                    'default_entity' => new $class(),
                ]);
            }

            return $response;

        } else if ($action == 'form') {

//            if (!$this->isAuthorized($config_entity, AuthorizationType::FORM)) {
//                return $this->redirectToRoute('core_admin_dashboard');
//            }

            // On récupère l'entité
            if ($entity_id != null && $entity_id > 0) {
                $this->vars['entity'] = $entity = $this->getDoctrine()->getRepository($class)->findWhere('entity.id = ' . $entity_id, 1);
            }
            // Si elle n'existe pas on la créer
            if ($entity == null || $entity == [] || is_string($entity)) {
                $this->vars['entity'] = $entity = new $class();
            }

            // Fichier override de definitions de formulaire "Module/Form/EntityType"
            $type = ucfirst($module) . '\Form\\' . $entity_default . 'Type';

            // Test si le fichier de définition existe
            if (class_exists($type)) {
                // Création du formulaire avec le fichier "Module/Form/EntityType" s'il existe
                $form = $this->createForm($type, $entity);
                // Retourne la vue du formulaire
                $object = $form->createView();
            } else {
                // On récupère les getters de l'entitée
                $getters = $entity->getters($entity);
                // On créer le formulaire
                $form = $this->createFormBuilder($entity);

                // Attribution de chaque champs du formulaire
                $fields = [];
                $use_translation = false;
                foreach ($content[$config_entity]['form']['fields'] as $field) {
                    if ($field['type'] == 'translation') {
                        $use_translation = true;
                    }
                    $fields[] = $field['property'];

                    // Type select
                    $choices = [];
                    if (key_exists('choices', $field)) {
                        $choices[] = $field['choices'];
                    } else {
                        $choices[] = null;
                    }
                }

                // Execution des getters s'ils existent dans la configuration
                foreach ($getters as $getter) {
                    $array = preg_split('/(?=[A-Z])/', $getter);
                    $getter = strtolower(str_replace('get_', '', implode('_', $array)));

                    if (false !== $key = array_search($getter, $fields)) {
                        $form->add($getter);
                    }
                }

                // Ajout des champs de traductions s'il en existe au moins un
                if ($use_translation) {
                    $form->add('translations', TranslationsType::class, [
                        'data_class' => null,
                    ]);
                }
                // Ajout des controls
                $form->add('submit', SubmitType::class);
                // Créer le formulaire
                $form = $form->getForm();
                // Retourne la vue du formulaire
                $object = $form->createView();
            }


            // Method POST - Gestion du formulaire
            if ($request->isMethod('POST')) {
                $form->handleRequest($request);
//                if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($entity);

                // Si le formulaire contient des traductions
                if (method_exists($entity, 'mergeNewTranslations')) {
                    $entity->mergeNewTranslations();
                }

                $em->flush();


                return $this->redirect($request->headers->get('referer'));
//                }
            }

            $template = '@' . $module . '/admin/theme/' . $template_entity . '_form';

            $this->vars['form_entity'] = $object;
            $this->vars['template'] = $template;
            $this->vars['entity'] = new $class();

            // Remplace "PageProductPariation" par "product_variation"
            $method = trim(str_replace('page', '', strtolower(implode('_', preg_split('/(?=[A-Z])/', $entity_default)))), '_');


            // Appel de controller spécifique
            $request->request->set('vars', $this->vars);
            $response = $this->forward(ucfirst($module) . '\Controller\AdminController::' . $method . '_form', []);

            // Appel du controller par défaut si le controller spécifique n'existe pas
            if ($response->getStatusCode() != 200) {
                $response = $this->generateTemplate($template);
            }

            return $response;

        } else if ($action == 'view') {

            if (!$this->isAuthorized($config_entity, AuthorizationType::VIEW)) {
                return $this->redirectToRoute('core_admin_dashboard');
            }

            $entity = $this->getDoctrine()->getRepository($class)->findWhere('entity.id = ' . $entity_id, 1);
            $template = '@' . $module . '/admin/theme/' . $template_entity . '_view';

            return $this->generateTemplate($template, [
                'entity' => $entity
            ]);
        } else if ($action == 'remove') {

            // Suppression de l'entité
            return $this->actionEntityRemove(
                $request,
                $class,
                $this->generateRouteWithParameters('core_admin_controller_entity_auto', $module, $entity, 'list')
            );

        } else if ($action == 'duplicate') {

            // Duplique l'entité
            return $this->actionEntityDuplicate(
                $request,
                $class,
                $this->generateRouteWithParameters('core_admin_controller_entity_auto', $module, $entity, 'list')
            );

        } else if ($action == 'status') {


            // On récupère l'entité
            if ($entity_id != null && $entity_id > 0) {
                $this->vars['entity'] = $entity = $this->getDoctrine()->getRepository($class)->findWhere('entity.id = ' . $entity_id, 1);
            }


            // Modifie de status "is_enabled" de l'entité
            return $this->actionEntityStatus(
                $request,
                $class,
                $this->generateRouteWithParameters('core_admin_controller_entity_auto', $module, $entity, 'list')
            );

        }

        throw new \Exception('L\'action "' . $action . '" est inconnue.');
    }

    /**
     * Retoure la liste des entité
     */
    public function actionEntityList($class, $condition = null)
    {
        if ($condition == null) {
            // Retourne toutes les entitées
            $results = $this->getDoctrine()->getRepository($class)->findAll();
        } else {
            // Retourne les entité en fonction d'une condition (Ex: d'une catégorie spécifique)
            $results = $this->getDoctrine()->getRepository($class)->findWhere('entity.' . $condition['property'] . ' = ' . $condition['id']);
        }

        if ($class == 'Shopping\Entity\Product') {

            $entities = [];
            foreach ($results as $entity) {
                $product = new Product($this->getDoctrine());
                $entities[] = $product->createProduct($entity->getId());
            }
        }

        return $results;
    }

    /**
     * GET - Retourne le formulaire d'une entité
     * POST - Effectue la création/modification d'une entité
     */
    public function actionEntityForm($request, $class, $redirectToRoute = null, $entity_id = null)
    {
        if ($entity_id == null) {
            $entity_id = $request->attributes->get('id');
        }

        // On récupère l'entité
        if ($entity_id != null && $entity_id > 0) {
            $this->vars['entity'] = $entity = $this->getDoctrine()->getRepository($class)->findWhere('entity.id = ' . $entity_id, 1);
        }

        // Si elle n'existe pas on la créer
        if ($entity = null || $entity = []) {
            $this->vars['entity'] = $entity = new $class();
        }

        $result = $this->generateEntityForm(
            $request,
            $class,
            str_replace('Entity', 'Form', $class . 'Type'),
            $entity_id,
            $redirectToRoute
        );

        // Retourne une réponse
        if ($result instanceof RedirectResponse) {
            return $result;
        }

        // Retourne le formulaire
        return $result->createView();
    }

    /**
     * Supprime une entité
     *
     * GET - Return une RedirectResponse
     * POST - Return un JsonResponse
     */
    public function actionEntityRemove($request, $class, $redirectToRoute)
    {
        $entity_id = $request->attributes->get('id');

        if ($entity_id == null || $entity_id < 0) {
            $entity_id = $request->query->get('id');
        }

        $entity = $this->getDoctrine()->getRepository($class)->findWhere('entity.id = ' . $entity_id, 1);

        if (!is_array($entity)) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();


//            $this->history->save(HistoryMessageType::FORM_REMOVE, 'Suppression: "' . $entity->getClass() . '" #' . $entity->getId() . '', 200, $this->getUser());
        }

        try {
            // Redirection normal
            return $this->redirectToRoute($redirectToRoute);
        } catch (\Exception $e) {
            try {
                // Redirection page actuel
                return $this->redirect($request->headers->get('referer'));
            } catch (\Exception $e) {
                // Redirection par default
                return $this->redirectToRoute('core_admin_dashboard');
            }
        }
    }

    /**
     * Change le statut (is_enabled)
     *
     * GET - Return une RedirectResponse
     * POST - Return un JsonResponse
     */
    public function actionEntityStatus($request, $class, $redirectToRoute = null)
    {
        $entity_id = $request->query->get('id');
        $entity = $this->getDoctrine()->getRepository($class)->findByColumn($entity_id, 'id');


        $em = $this->getDoctrine()->getManager();
        $entity->setIsEnabled(!$entity->getIsEnabled());
        $em->flush();

//        $this->history->save(HistoryMessageType::FORM_STATUT, 'Modification du statut: "' . $entity->getClass() . '" #' . $entity->getId() . '', 200, $this->getUser());


        try {
            // Redirection normal
            return $this->redirectToRoute($redirectToRoute);
        } catch (\Exception $e) {
            try {
                // Redirection page actuel
                return $this->redirect($request->headers->get('referer'));
            } catch (\Exception $e) {
                // Redirection par default
                return $this->redirectToRoute('core_admin_dashboard');
            }
        }
    }

    /**
     * Duplique une entité
     *
     * GET - Return une RedirectResponse
     * POST - Return une JsonResponse
     */
    public function actionEntityDuplicate($request, $class, $redirectToRoute = null, $callback = null)
    {
        $entity_id = $request->attributes->get('id');
        $entity = $this->getDoctrine()->getRepository($class)->findByColumn($entity_id, 'id');

        $em = $this->getDoctrine()->getManager();

        $clone = clone $entity;

        if ($callback != null) {
            $clone = call_user_func($callback, [$clone]);
        }

        $em->persist($clone);
        $em->flush();

        $this->history->save(HistoryMessageType::FORM_DUPLICATE, 'Duplication: "' . get_class($entity) . '" #' . $entity->getId() . '', 200, $this->getUser());

        if ($request->isMethod('POST')) {
            return new JsonResponse([], 200);
        } else {
            if ($redirectToRoute != null && !is_array($redirectToRoute)) {
                return $this->redirectToRoute($redirectToRoute);
            }
            return true;
        }
    }

    /**
     * Retourne le formulaire d'une entité et execute son CRUD
     */
    public function generateEntityForm($request, $class, $type, $id = null, $redirectToRoute = null)
    {
        if ($id != null && $id > 0) {
            if (is_numeric($id)) {
                // Récupère l'entité avec un nombre "id"
                $entity = $this->getDoctrine()->getRepository($class)->findByColumn($id, 'id');
            } else {
                // Récupère l'entité avec un string "unique_key"
                $entity = $this->getDoctrine()->getRepository($class)->findByColumn($id, 'unique_key');
            }
            $method = 0;
        } else {
            $entity = new $class();
            $method = 1;
        }

        $form = $this->createForm($type, $entity);

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);


//            if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);
            if (method_exists($entity, 'mergeNewTranslations')) {
                $entity->mergeNewTranslations();
            }


            $em->flush();

            if ($method == 0) {
//                $this->history->save(HistoryMessageType::FORM_EDIT, 'Edition: "' . $entity->getClass() . '" #' . $entity->getId() . '', 200, $this->getUser());
            } else {
//                $this->history->save(HistoryMessageType::FORM_NEW, 'Création: "' . $entity->getClass() . '" #' . $entity->getId() . '', 200, $this->getUser());
            }

            if ($redirectToRoute != null) {
                if (is_string($redirectToRoute)) {
                    // Redirection avec un URL complète
                    return $this->redirectToRoute($redirectToRoute);
                } else {
                    //Redirection avec un tableau de paramètres
                    return $this->redirectToRouteWithParameters($redirectToRoute);
                }
            }
//            }
        }

        return $form;
    }

    /**
     * Génère une route avec paramètres
     */
    public function generateRouteWithParameters($name, $module = null, $entity = null, $action = null, $id = null, $code = null)
    {
        $str = $this->generateUrl($name) . '?module=' . $module . '&entity=' . str_replace($module, '', $entity) . '&action=' . $action;

        if ($id != null) {
            $str .= '&id=' . $id;
        }

        return $this->redirect($str);
    }

}
