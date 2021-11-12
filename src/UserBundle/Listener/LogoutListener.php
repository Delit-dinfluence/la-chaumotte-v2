<?php

namespace User\Listener;

use Core\Service\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class LogoutListener implements LogoutSuccessHandlerInterface
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function onLogoutSuccess(Request $request)
    {
        $this->session->destroy();

        // TODO Checker le doublon de session qu ice créer en base de donnée

        return new RedirectResponse('/');
    }

}