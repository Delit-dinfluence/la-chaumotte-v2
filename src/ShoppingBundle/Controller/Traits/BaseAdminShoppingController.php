<?php

namespace Shopping\Controller\Traits;

use Core\Controller\BaseAdminController;
use Core\Controller\BaseController;
use Shopping\Entity\OrderConfiguration;
use Shopping\Entity\ProductConfiguration;
use Shopping\Entity\ResearchConfiguration;
use Shopping\Entity\ShopConfiguration;
use Core\Service\History\HistoryMessage;
use Shopping\Service\Cart\Cart;
use Shopping\Service\Cart\CartManager;
use Shopping\Service\Order\OrderManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

trait BaseAdminShoppingController
{
    /**
     * Panier
     */
    protected $cart_manager;

    /**
     * Commande
     */
    protected  $order_manager;



}
