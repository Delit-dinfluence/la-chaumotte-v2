<?php

namespace Shopping\Service\Cart;

use Core\Service\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartSession
{
    /**
     * Clé de session
     *
     * @var string
     */
    const SESSION_KEY = 'shopping_cart';

    /**
     * Session actuelle
     *
     * @vars Session
     */
    private $session;

    /**
     * Constructeur
     *
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Retourne le panier stocké en session
     */
    public function getCartFromSession()
    {
        return Cart::unserialize($this->session->get(self::SESSION_KEY));
    }

    /**
     * Mise à jour du panier stocké en session
     */
    public function persist($cart)
    {
        $this->session->set(self::SESSION_KEY, $cart->serialize());
    }

    /**
     * Supprime le panier stocké en session
     */
    public function clear()
    {
        $this->session->clear(self::SESSION_KEY);
    }

}
