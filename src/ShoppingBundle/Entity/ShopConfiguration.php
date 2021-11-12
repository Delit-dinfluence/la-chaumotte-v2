<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des types de remises
 */
abstract class BoughtRedirectType extends Enum
{
    const NONE = 0;
    const CART = 1;
    const POPUP = 2;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::NONE => 'Aucune',
        self::CART => 'Panier',
        self::POPUP => 'Pop-up récapitulatif',
    ];

}


/**
 * Enumération des types d'affichage de produits aléatoires
 */
abstract class RandomPrintType extends Enum
{
    const ALL = 0;
    const PACK = 1;
    const CATEGORY = 2;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::ALL => 'Tous les produits',
        self::PACK => 'Produits associés',
        self::CATEGORY => 'Même catégorie',
    ];

}


/**
 * Configuration principale de l'application
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\ShopConfigurationRepository")
 * @ORM\Table(name="shopping_configuration")
 */
class ShopConfiguration
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Type de redirection après un achat
     *
     * @ORM\Column(type="integer")
     */
    private $bought_redirect_type;

    /**
     * Type de produits aléatoires
     *
     * @ORM\Column(type="integer")
     */
    private $random_type;

    /**
     * Nombre de produit aléatoires
     *
     * @ORM\Column(type="integer")
     */
    private $random_count;

    /**
     * Type de produits aléatoires
     *
     * @ORM\Column(type="integer")
     */
    private $free_delivery_count;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->setRandomType(RandomPrintType::ALL);
        $this->setRandomCount(8);
    }

    /**
     * @return mixed
     */
    public function getFreeDeliveryCount()
    {
        return $this->free_delivery_count;
    }

    /**
     * @param mixed $free_delivery_count
     */
    public function setFreeDeliveryCount($free_delivery_count): void
    {
        $this->free_delivery_count = $free_delivery_count;
    }


    /**
     * @return mixed
     */
    public function getBoughtRedirectType()
    {
        return $this->bought_redirect_type;
    }

    /**
     * @param mixed $bought_redirect_type
     */
    public function setBoughtRedirectType($bought_redirect_type): void
    {
        $this->bought_redirect_type = $bought_redirect_type;
    }

    /**
     * @return mixed
     */
    public function getRandomType()
    {
        return $this->random_type;
    }

    /**
     * @param mixed $random_type
     */
    public function setRandomType($random_type): void
    {
        $this->random_type = $random_type;
    }

    /**
     * @return mixed
     */
    public function getRandomCount()
    {
        return $this->random_count;
    }

    /**
     * @param mixed $random_count
     */
    public function setRandomCount($random_count): void
    {
        $this->random_count = $random_count;
    }


}
