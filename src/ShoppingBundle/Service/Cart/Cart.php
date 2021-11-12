<?php

namespace Shopping\Service\Cart;

use Doctrine\ORM\EntityManagerInterface;
use Shopping\Entity\Product;

/**
 * Class Cart
 *
 * Panier
 */
class Cart
{
    /**
     * Produits du panier
     *
     * @var \Shopping\Service\Cart\CartProduct[]
     */
    private $rows = [];

    public function add($product, $quantity, $attributes = [])
    {
        // Recherche de la présence d'un même produit et ajout de la quantité
        foreach ($this->rows as $row) {
            if ($row->getproduct() == $product) {

                if (!array_diff($attributes, $row->getAttributes())) {

                    $row->addQuantity($quantity);
                    $row->setAttributes($attributes);
                    return $this;

                }
            }
        }

        // Si aucun produit n'est trouvé on en ajoute un nouveau
        $this->rows[] = new CartProduct($product, $quantity, $attributes);
        return $this;
    }

    public function update($product, $quantity, $attributes = [])
    {
        // Recherche de la présence d'un même produit et ajout de la quantité
        foreach ($this->rows as $row) {
            if ($row->getproduct() == $product) {

                if (!array_diff($attributes, $row->getAttributes())) {

                    $row->updateQuantity($quantity);
                    $row->setAttributes($attributes);
                    return $this;

                }
            }
        }

        // Si aucun produit n'est trouvé on en ajoute un nouveau
        $this->rows[] = new CartProduct($product, $quantity, $attributes);
        return $this;
    }

    public function remove($product, $quantity = null)
    {
        // Parcours des produits du panier
        foreach ($this->rows as $key => $row) {
            if ($row->getproduct() == $product) {

                // Suppression d'une certaine quantité de produit
                if ($quantity != null && $quantity > 0 && $quantity < $row->getQuantity()) {
                    $row->removeQuantity($quantity);
                    return $this;
                }

                // Suppression du produit
                unset($this->rows[$key]);
                return $this;
            }
        }

        // Aucun produit n'a été trouvé
        throw new \Exception ('Impossible de trouver le produit correspondant', 404);
    }

    public function getProducts()
    {
        return $this->rows;
    }

    public function serialize()
    {
        return array_map(function ($row) {
            return $row->serialize();
        }, $this->rows);
    }

    public function unserialize($array)
    {
        $cart = new Cart();

        if ($array != null) {

            // Parcours des CartProducts sérialisés
            foreach ($array as $row) {
                $cart->add($row->product, $row->quantity, (array)$row->attributes);
            }

        }

        return $cart;
    }

}
