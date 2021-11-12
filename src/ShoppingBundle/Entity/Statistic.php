<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des types de statistic
 */
abstract class StatisticType extends Enum
{
    const PRODUCT_VIEW = 0;
    const PRODUCT_CART_ADDED = 1;
    const PRODUCT_PURCHASED = 2;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::PRODUCT_VIEW => 'Visualisation du produit',
        self::PRODUCT_CART_ADDED => 'Ajout au panier du produit',
        self::PRODUCT_PURCHASED => 'Produit acheté',
    ];

}

/**
 * Statistiques
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\StatisticRepository")
 * @ORM\Table(name="shopping_statistic")
 */
class Statistic
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Type d'action réalisé
     *
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * Produit
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="statistic_product")
     * @ORM\JoinColumn(name="product", referencedColumnName="id", nullable=true)
     */
    private $product;

    /**
     * Constructor
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product): void
    {
        $this->product = $product;
    }

}
