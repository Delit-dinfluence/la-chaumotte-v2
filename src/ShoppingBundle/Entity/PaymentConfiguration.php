<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration des moyens de paiements
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\PaymentConfigurationRepository")
 * @ORM\Table(name="shopping_payment_configuration")
 */
class PaymentConfiguration
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
