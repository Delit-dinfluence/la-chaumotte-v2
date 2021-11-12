<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moyen de livraison - Livraison à domicile express
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\DeliveryExpressRepository")
 * @ORM\Table(name="shopping_delivery_express")
 */
class DeliveryExpress extends Delivery
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
