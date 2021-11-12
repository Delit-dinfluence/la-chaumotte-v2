<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration des moyens de livraison
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\DeliveryConfigurationRepository")
 * @ORM\Table(name="shopping_delivery_configuration")
 */
class DeliveryConfiguration
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();
    }

}
