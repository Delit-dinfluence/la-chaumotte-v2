<?php

namespace App\Controller;

use Core\Controller\Traits\BaseAdminController;
use Core\Controller\Traits\BaseController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/4DM1n157R4710N/app", name="app_admin_")
 */
class AdminController extends AbstractController
{
    use BaseController;
    use BaseAdminController;

    /**
     * Nom du bundle
     */
    protected $bundle_name = 'app';



}
