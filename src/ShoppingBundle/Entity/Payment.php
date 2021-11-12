<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des moyens de paiements
 */
abstract class PaymentType extends Enum
{
    const CHECK = 0;
    const PAYPAL = 1;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::CHECK => 'Chèque',
        self::PAYPAL => 'Paypal',
    ];

}

/**
 * Moyen de paiement
 */
abstract class Payment
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
