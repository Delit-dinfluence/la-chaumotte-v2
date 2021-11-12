<?php

namespace Shopping\Service\Cart;

use Exception;
use Shopping\Entity\Product;

/**
 * Class CartProduct
 *
 * Produits du panier
 */
class CartProduct
{
    /**
     * Produit
     *
     * @vars \Shopping\Entity\Product
     */
    private $product;

    /**
     * Quantité
     *
     * @vars integer
     */
    private $quantity;

    /**
     * Attributs
     *
     * @vars array[]
     */
    private $attributes;

    /**
     * Constructeur
     *
     * @param integer $product_id
     * @param integer $quantity
     * @param array[] $attributes
     */
    public function __construct($product_id, $quantity = 1, $attributes = [])
    {
        $this->product = $product_id;
        $this->quantity = $quantity;
        $this->attributes = $attributes;

        // Quantité positive obligatoire
        if ($this->quantity < 1) {
            $this->quantity = 1;
        }

    }

    /**
     * Retourne les attributs du produit
     *
     * @return array[]
     */
    public function getAttributes()
    {
        return (array)$this->attributes;
    }

    /**
     * Définis les attributs du produit
     *
     * @param array[] $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Retourne le produit
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Retourne la quantité de produits
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function addQuantity($quantity)
    {
        if ($quantity < 1) {
            throw new \Exception('Impossible d\'ajouter une quantité négative', 500);
        }

        $this->quantity = $this->quantity + $quantity;
    }

    public function updateQuantity($quantity)
    {
        if ($quantity < 1) {
            throw new \Exception('Impossible d\'ajouter une quantité négative', 500);
        }

        $this->quantity = $quantity;
    }

    public function removeQuantity($quantity)
    {
        if ($quantity < 1) {
            throw new \Exception('Impossible de supprimer une quantité négative', 500);
        }

        if ($quantity >= $this->quantity) {
            throw new Exception('Impossible de supprimer plus de quantité que celle disponible');
        }

        $this->quantity = $this->quantity - $quantity;
    }

    /**
     * Sérialize le produit du panier
     *
     * @return string[]
     */
    public function serialize()
    {
        return [
            'product' => $this->product,
            'quantity' => $this->quantity,
            'attributes' => $this->attributes
        ];
    }
}