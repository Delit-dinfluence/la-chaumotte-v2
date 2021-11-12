<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moyen de livraison - Collisimo
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\DeliveryCollisimoRepository")
 * @ORM\Table(name="shopping_delivery_collisimo")
 */
class DeliveryCollisimo extends Delivery
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
