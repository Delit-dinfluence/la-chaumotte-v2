<?php

namespace Core\Controller;

use Core\Controller\Traits\BaseController;
use Core\Entity\ComingSoonConfiguration;
use Core\Entity\MaintenanceConfiguration;
use Core\Service\FileReaderWriter\FileReaderWriter;
use Core\Service\History\HistoryMessage;
use Core\Service\Session\Session;
use Leafo\ScssPhp\Compiler;
use Shopping\Controller\Traits\BaseShoppingController;
use Shopping\Entity\Category;
use Shopping\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use User\Entity\Authorization;
use User\Entity\AuthorizationType;

class PageController extends AbstractController
{
    use BaseController;
    use BaseShoppingController;

    public function router(Request $request, FileReaderWriter $writer)
    {
        $this->initializeController($request);

        // Utilisation d'une redirection
        if (!is_string($this->vars['controller'])) {
            return $this->vars['controller'];
        }

        // Compilation des fichiers SCSS
        $this->compileSCSS();

        // Configuration de la maintenance
        $this->vars['maintenance'] = $use_maintenance = $this->getDoctrine()->getRepository(MaintenanceConfiguration::class)->find(1);

        // Configuration de la page d'attente
        $this->vars['coming_soon'] = $use_coming_soon = $this->getDoctrine()->getRepository(ComingSoonConfiguration::class)->find(1);

        // Pages autorisées à passer au travers des "Maintenance" et "Coming Soon"
        $pages_allowed = [
            'App\Controller\PageController::connect',
            'App\Controller\PageController::forgotpassword',
            'App\Controller\PageController::forgotpasswordreset',

            'App\Controller\PageController::maintenance',
            'App\Controller\PageController::comingsoon',
        ];


        try {
            if ($use_maintenance->getUseMaintenance() && !$this->checkAuthorization($request, [
                    'authorization' => 'maintenance',
                    'type' => AuthorizationType::EDIT
                ]) && !in_array($this->vars['controller'], $pages_allowed)) {

                // Utilisation de la page de maintenance
                return $this->redirect($this->vars['pages']['maintenance']->translate($this->vars['locale'])->getUri());

            } elseif ($use_coming_soon->getUseComingSoon() && !$this->checkAuthorization($request, [
                    'authorization' => 'comingsoon',
                    'type' => AuthorizationType::EDIT
                ]) && !in_array($this->vars['controller'], $pages_allowed)) {

                // Utilisation de la page d'attente
                return $this->redirect($this->vars['pages']['coming_soon']->translate($this->vars['locale'])->getUri());

            } elseif (($this->checkAuthorization($request, [
                    'authorization' => explode('::', $this->vars['controller'])[1],
                    'type' => AuthorizationType::VIEW
                ])) || ($this->vars['controller'] == 'Core\Controller\PageController::custom_url' && array_key_exists('page', $this->vars))) {

                // Configuration de la page
                $page = explode('::', $this->vars['controller'])[1];
                $this->setPageSettings($request, $page);

                $request->attributes->set('vars', $this->vars);

                // Initialisation de variables communes aux controllers et spécifique à l'application
                $this->forward('App\Controller\PageController::initialize', [
                    'vars' => $this->vars
                ]);


                // Accès normal à l'application
                return $this->forward($this->vars['controller'], [
                    'vars' => $this->vars
                ]);

            } else if (array_key_exists('page', $this->vars)) {

                // Une connexion est obligatoire pour accéder à cette page
                return $this->redirect($this->vars['pages']['connect']->translate($this->vars['locale'])->getUri());

            } else {

                // Page introuvable
                return $this->redirect($this->vars['pages']['error404']->translate($this->vars['locale'])->getUri());
            }

        } catch (\Exception $e) {
            dump($e);
            die();
        }

    }

    public function custom_url(Request $request)
    {
        $slug = trim($request->getRequestUri(), '/');

        if (preg_match('#^(.){2}/(.)+$#', $slug, $matches)) {
            $slug = substr($slug, 3);
        }

        // Catégory personnalisée
        $item = $this->getDoctrine()->getRepository(Category::class)->findByUrl($slug);

        if ($item != []) {

            return $this->forward('App\Controller\PageController::products', [
                'custom_url' => true,
                'custom_id' => $item->getId()
            ]);
        }

        // Produit personnalisé
        $item = $this->getDoctrine()->getRepository(Product::class)->findByUrl($slug);


        if ($item != []) {

            return $this->forward('App\Controller\PageController::product', [
                'custom_url' => true
            ]);
        }

        return $this->forward('App\Controller\PageController::error404');

    }

    public function redirection(Request $request)
    {

        dump($this->vars);
        die();
    }

    /**
     * Compilation de tous les fichiers SCSS
     */
    private function compileSCSS()
    {
        // Path to the folder of the sass files
        $sassFilesPath = $this->getParameter('kernel.project_dir') . '/public/assets/css/modules/';

        $cssFilesPath = $this->getParameter('kernel.project_dir') . '/public/build/';

//        if ($_ENV['APP_ENV'] == 'dev' || $_ENV['APP_DEBUG'] == '1') {

        // Nettoyage des fichiers  "build/*.css"
        array_map('unlink', glob($cssFilesPath . '*.css'));

        // Compilation des fichiers scss
        $this->scandir($sassFilesPath, $cssFilesPath);
//        }

    }

    /**
     * Compilation des fichiers SCSS d'un dossier spécifique et récursivement
     */
    private function scanDir($target, $dest)
    {

        if (is_dir($target)) {

            $files = glob($target . '*', GLOB_MARK);

            foreach ($files as $file) {
                $this->scanDir($file, $dest);
            }

        } else {


            $variables = file_get_contents($this->getParameter('kernel.project_dir') . '/public/assets/css/_variables.scss');
            $content = file_get_contents($target);


            $scss = new Compiler();
            $scss->setFormatter(new \Leafo\ScssPhp\Formatter\Compressed());

            $filename = basename($target);
            $filename = str_replace('.scss', '.min.css', ltrim($filename, '_'));

            // Write output css file
            file_put_contents(
                $dest . $filename,

                $scss->compile(
                    $variables . $content
                )
            );
        }

    }

}
