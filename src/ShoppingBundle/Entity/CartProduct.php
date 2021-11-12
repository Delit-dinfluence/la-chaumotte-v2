<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit de panier
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\CartProductRepository")
 * @ORM\Table(name="shopping_cart_product")
 */
class CartProduct
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Sauvegarde de la référence du produit
     *
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * Quantité de produits
     *
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * Sauvegarde de la designation du produit
     *
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * Sauvegarde du prix HT du produit
     *
     * @ORM\Column(type="float")
     */
    private $price_ht;

    /**
     * Sauvegarde du taux de TVA du produit
     *
     * @ORM\Column(type="float")
     */
    private $rate_tva;

    /**
     * Sauvegarde du poids du produit
     *
     * @ORM\Column(type="float")
     */
    private $weight;

    /**
     * Panier associé au produit
     *
     * @ORM\ManyToOne(targetEntity="Cart", inversedBy="products")
     * @ORM\JoinColumn(name="cart", referencedColumnName="id", nullable=true)
     */
    private $cart;

    /**
     * Produit de l'application
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="cart_products")
     * @ORM\JoinColumn(name="product", referencedColumnName="id", nullable=true)
     */
    private $product;

    /**
     * Attributs
     *
     * @ORM\Column(type="text")
     */
    private $attributes;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->setQuantity(1);
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getPriceHt()
    {
        return $this->price_ht;
    }

    /**
     * @param mixed $price_ht
     */
    public function setPriceHt($price_ht): void
    {
        $this->price_ht = $price_ht;
    }

    /**
     * @return mixed
     */
    public function getRateTva()
    {
        return $this->rate_tva;
    }

    /**
     * @param mixed $rate_tva
     */
    public function setRateTva($rate_tva): void
    {
        $this->rate_tva = $rate_tva;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param mixed $cart
     */
    public function setCart($cart): void
    {
        $this->cart = $cart;
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

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes): void
    {
        $this->attributes = $attributes;
    }

}
