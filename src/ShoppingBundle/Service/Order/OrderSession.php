<?php

namespace Shopping\Service\Order;

use Core\Service\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Commande
 */
class OrderSession
{
    /**
     * Session actuelle
     */
    private $session;

    /**
     * @var string
     */
    const SESSION_KEY = 'shopping_order';

    /**
     * Constructeur
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Retourne la commande stockée en session
     */
    public function getOrderFromSession()
    {
        return Order::unserialize($this->session->get(self::SESSION_KEY));
    }

    /**
     * Miqe à jour la commande stockée en session
     */
    public function persist($order)
    {
        $this->session->set(self::SESSION_KEY, $order->serialize());
    }

    /**
     * Supprime la commande stockée en session
     */
    public function clear()
    {
        $this->session->clear(self::SESSION_KEY);
    }

}
