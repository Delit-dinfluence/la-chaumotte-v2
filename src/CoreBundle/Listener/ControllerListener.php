<?php

namespace Core\Listener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class ControllerListener
{
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController()[0];

//        if (method_exists($controller, 'initializeController')) {
//            $controller->initializeController($event->getRequest(), $event->getController()[1]);
//        }

//        if (method_exists($controller, 'initializeShoppingController')) {
//            $controller->initializeShoppingController($event->getRequest(), $event->getController()[1]);
//        }

        if (method_exists($controller, 'initializeAdminController')) {
            $controller->initializeController($event->getRequest(), $event->getController()[1]);
            $controller->initializeAdminController($event->getRequest(), $event->getController()[1]);
        }

    }
}