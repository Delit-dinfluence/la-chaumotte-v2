<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moyen de livraison - Retrait en magasin
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\DeliveryShopRepository")
 * @ORM\Table(name="shopping_delivery_shop")
 */
class DeliveryShop extends Delivery
{

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
    }

}
