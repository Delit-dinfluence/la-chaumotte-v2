<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des types de livraisons
 */
abstract class DeliveryType extends Enum
{
    const SHOP = 0;
    const HOME = 1;
    const COLLISIMO = 2;
    const RELAY_POINTS = 3;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::SHOP => 'Retrait en magasin',
        self::HOME => 'Livraison à domicile',
        self::COLLISIMO => 'Collisimo',
        self::RELAY_POINTS => 'Points relay',
    ];

}

/**
 * Enumération des types de livraisons
 */
abstract class DeliveryPriceType extends Enum
{
    const FIXE = 0;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::FIXE => 'Prix fixe',
    ];

}


/**
 * Moyen de livraison
 */
abstract class Delivery
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }



    /**
     * Délai de livraison
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $delivery_delay;

    /**
     * URL de suivi
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $follower_url;

    /**
     * Poids maximum du paquet
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $max_weight;

    /**
     * Largeur maximum du paquet
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $max_width;

    /**
     * Hauteur maximum du paquet
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $max_height;

    /**
     * Appliquer des frais de manutention ?
     *
     * @ORM\Column(type="boolean")
     */
    protected $use_handling_charges;

    /**
     * Frais de manutention
     *
     * @ORM\Column(type="float")
     */
    protected $handling_charges;

    /**
     * @ORM\Column(type="integer")
     */
    protected $out_of_range_behavior;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();


    }

    /**
     * @return mixed
     */
    public function getOutOfRangeBehavior()
    {
        return $this->out_of_range_behavior;
    }

    /**
     * @param mixed $out_of_range_behavior
     */
    public function setOutOfRangeBehavior($out_of_range_behavior): void
    {
        $this->out_of_range_behavior = $out_of_range_behavior;
    }


    /**
     * @return mixed
     */
    public function getDeliveryDelay()
    {
        return $this->delivery_delay;
    }

    /**
     * @param mixed $delivery_delay
     */
    public function setDeliveryDelay($delivery_delay): void
    {
        $this->delivery_delay = $delivery_delay;
    }

    /**
     * @return mixed
     */
    public function getFollowerUrl()
    {
        return $this->follower_url;
    }

    /**
     * @param mixed $follower_url
     */
    public function setFollowerUrl($follower_url): void
    {
        $this->follower_url = $follower_url;
    }

    /**
     * @return mixed
     */
    public function getMaxWeight()
    {
        return $this->max_weight;
    }

    /**
     * @param mixed $max_weight
     */
    public function setMaxWeight($max_weight): void
    {
        $this->max_weight = $max_weight;
    }

    /**
     * @return mixed
     */
    public function getMaxWidth()
    {
        return $this->max_width;
    }

    /**
     * @param mixed $max_width
     */
    public function setMaxWidth($max_width): void
    {
        $this->max_width = $max_width;
    }

    /**
     * @return mixed
     */
    public function getMaxHeight()
    {
        return $this->max_height;
    }

    /**
     * @param mixed $max_height
     */
    public function setMaxHeight($max_height): void
    {
        $this->max_height = $max_height;
    }

    /**
     * @return mixed
     */
    public function getUseHandlingCharges()
    {
        return $this->use_handling_charges;
    }

    /**
     * @param mixed $use_handling_charges
     */
    public function setUseHandlingCharges($use_handling_charges): void
    {
        $this->use_handling_charges = $use_handling_charges;
    }

    /**
     * @return mixed
     */
    public function getHandlingCharges()
    {
        return $this->handling_charges;
    }

    /**
     * @param mixed $handling_charges
     */
    public function setHandlingCharges($handling_charges): void
    {
        $this->handling_charges = $handling_charges;
    }


    public function getDeliveryTotalPrice()
    {
        $total = $this->getStaticPrice();

        if ($this->getUseHandlingCharges()) {
            $total += $this->getHandlingCharges();
        }

        return $total;
    }

}
