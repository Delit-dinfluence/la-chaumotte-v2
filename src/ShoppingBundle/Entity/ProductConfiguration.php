<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration principale de l'application
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\ProductConfigurationRepository")
 * @ORM\Table(name="shopping_product_configuration")
 */
class ProductConfiguration
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
