<?php

namespace User\Listener;

use Core\Entity\HistoryGravity;
use Core\Entity\HistoryMessageType;
use Core\Service\History\HistoryMessage;
use Core\Service\Session\Session;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener
{
    private $history;
    private $em;
    private $session;
    private $request_stack;

    public function __construct(EntityManagerInterface $em, HistoryMessage $history, Session $session, RequestStack $request_stack)
    {
        $this->em = $em;
        $this->session = $session;
        $this->history = $history;
        $this->request_stack = $request_stack;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();
        $user->setUpdatedAt(new \DateTime());

        $this->em->persist($user);
        $this->em->flush();

        $this->session->set('user', $user);

        $this->history->save(HistoryMessageType::LOGIN, 'Connexion au back-office depuis ' . $this->request_stack->getCurrentRequest()->getClientIp(), 200, $user);
    }



}