<?php

namespace Shopping\Service\Cart;

use Core\Service\Session\Session;
use Doctrine\Common\Persistence\ManagerRegistry;
use Shopping\Entity\Attribute;
use Shopping\Entity\AttributeGroup;

/**
 * Class CartManager
 *
 * CartManager s'occupe de toute la gestion du panier et des produits ECommerce
 */
class CartManager
{
    /**
     * Panier
     *
     * @vars Shopping\Service\Cart
     */
    private $cart;

    /**
     * Panier en session
     *
     * @vars Shopping\Service\CartSession
     */
    private $cart_session;

    /**
     * ManagerRegistry
     *
     * @vars ManagerRegistry
     */
    private $entityManager;

    /**
     * Constructeur
     *
     * @param Session $session
     * @param ManagerRegistry $entityManager
     */
    public function __construct(Session $session, ManagerRegistry $entityManager)
    {
        $this->entityManager = $entityManager;

        // Création de la session de panier
        $this->cart_session = new CartSession($session);

        // Récupère le panier depuis la session
        $this->cart = $this->cart_session->getCartFromSession();
    }

    /**
     * Ajoute $quantity de $product au panier
     */
    public function add($product, $quantity)
    {
        // Ajoute le produit au panier
        $this->cart->add($product->getProduct()->getId(), $quantity, $product->getVariations());

        // Modifie le panier en session
        $this->cart_session->persist($this->cart);
    }

    /**
     * Mise à jours de $quantity de $product au panier
     */
    public function update($product, $quantity)
    {
        // Ajoute le produit au panier
        $this->cart->update($product->getProduct()->getId(), $quantity);

        // Modifie le panier en session
        $this->cart_session->persist($this->cart);
    }

    /**
     * Supprime $quantity de $product au panier
     */
    public function remove($product, $quantity)
    {
        // Supprime le produit du panier
        $this->cart->remove($product->getId(), $quantity);

        // Modifie le panier en session
        $this->cart_session->persist($this->cart);
    }

    /**
     * Supprime le panier
     */
    public function clear()
    {
        // Réinitialise le panier
        $this->cart = new Cart();

        // Réinitialize le panier en session
        $this->cart_session->clear();
    }


    /**
     * Prix HT pour les produits avec $product_id
     */
    public function getProductRowTotalHTByProductId($product_id)
    {

        foreach ($this->cart->getProducts() as $row) {

            if ($row->getProduct() == $product_id) {
                return $this->getProductRowTotalHT($row);
            }
        }

    }

    /**
     * Prix TTC pour les produits avec $product_id
     */
    public function getProductRowTotalTTCByProductId($product_id)
    {

        foreach ($this->cart->getProducts() as $row) {

            if ($row->getProduct() == $product_id) {
                return $this->getProductRowTotalTTC($row);
            }
        }

    }

    /**
     * Poids pour les produits avec $product_id
     */
    public function getProductRowTotalWeightByProductId($product_id)
    {

        foreach ($this->cart->getProducts() as $row) {

            if ($row->getProduct() == $product_id) {
                return $this->getProductRowTotalWeight($row);
            }
        }

    }

    /**
     * Nombre de produits avec $product_id
     */
    public function getProductRowTotalCountByProductId($product_id)
    {

        foreach ($this->cart->getProducts() as $row) {

            if ($row->getProduct() == $product_id) {
                return $this->getProductRowTotalCount($row);
            }
        }

    }

    /**
     * Prix HT pour les produits de $row
     */
    public function getProductRowTotalHT($row)
    {
        $product = new \Shopping\Service\Product\Product($this->entityManager);
        $product->createProduct($row->getProduct(), $row->getAttributes());

        $totalHT = (float)($product->getProduct()->getPriceHT() * $row->getQuantity());

        if ($totalHT < 0) {
            throw new \Exception('Une erreur est survenue lors du calcule HT des produits', 500);
        }

        return $totalHT;
    }

    /**
     * Prix TTC pour les produits de $row
     */
    public function getProductRowTotalTTC($row)
    {
        $product = new \Shopping\Service\Product\Product($this->entityManager);
        $product->createProduct($row->getProduct(), $row->getAttributes());

        $totalTTC = (float)($product->getProduct()->getPriceTTC() * $row->getQuantity());

        if ($totalTTC < 0) {
            throw new \Exception('Une erreur est survenue lors du calcule TTC des produits', 500);
        }

        return $totalTTC;
    }

    /**
     * Poids pour les produits de $row
     */
    public function getProductRowTotalWeight($row)
    {
        $product = new \Shopping\Service\Product\Product($this->entityManager);
        $product->createProduct($row->getProduct(), $row->getAttributes());

        $totalWeight = (float)($product->getProduct()->getWeight() * $row->getQuantity());

        if ($totalWeight < 0) {
            throw new \Exception('Une erreur est survenue lors du calcule du poids des produits', 500);
        }
        return $totalWeight;
    }

    /**
     * Nombre de produits de $row
     */
    public function getProductRowTotalCount($row)
    {
        $totalCount = $row->getQuantity();

        if ($totalCount < 0) {
            throw new \Exception('Une erreur est survenue lors du calcule du nombre de produits', 500);
        }

        return $totalCount;
    }

    /**
     * Prix HT de tous les produits du panier
     */
    public function getCartTotalHT()
    {
        $totalHT = 0;

        foreach ($this->cart->getProducts() as $row) {
            $totalHT += $this->getProductRowTotalHT($row);
        }

        return $totalHT;
    }

    /**
     * Prix TTC de tous les produits du panier
     */
    public function getCartTotalTTC()
    {
        $totalTTC = 0;

        foreach ($this->cart->getProducts() as $row) {
            $totalTTC += $this->getProductRowTotalTTC($row);
        }

        return $totalTTC;
    }

    /**
     * Poids de tous les produits du panier
     */
    public function getCartTotalWeight()
    {
        $totalWeight = 0;

        foreach ($this->cart->getProducts() as $row) {
            $totalWeight += $this->getProductRowTotalWeight($row);
        }

        return $totalWeight;
    }

    /**
     * Nombre de produits du panier
     */
    public function getCartTotalProductsCount()
    {
        $totalCount = 0;

        foreach ($this->cart->getProducts() as $row) {
            $totalCount += $this->getProductRowTotalCount($row);
        }

        return $totalCount;
    }


    public function getCart()
    {
        $cart = [];
        $cart['products'] = [];

        // Parcours des CartProduct du panier
        foreach ($this->cart->getProducts() as $row) {

            // Création du produit
            $product = new \Shopping\Service\Product\Product($this->entityManager);
            $product->createProduct($row->getProduct(), $row->getAttributes());

            $array = [];
            foreach ($row->getAttributes() as $key => $value) {
                $group = $this->entityManager->getRepository(AttributeGroup::class)->find($key);

                $attribute = null;
                if ((integer)$value > 0) {
                    $attribute = $this->entityManager->getRepository(Attribute::class)->find($value);
                }

                // Informations sur les attributes
                $array[$key] = [
                    'group' => $group,
                    'attribute' => $attribute,
                    'value' => $value
                ];
            }

            // Informations sur les produits
            $item = [
                'product' => $product->getProduct(),
                'quantity' => $row->getQuantity(),
                'variation' => $product->getSelectedVariation(),
                'attributes' => $array,
                'productTotalHT' => $this->getProductRowTotalHT($row),
                'productTotalTTC' => $this->getProductRowTotalTTC($row),
                'productTotalWeight' => $this->getProductRowTotalWeight($row),
            ];

            if ($item['product'] != null) {
                $cart['products'][] = $item;
            }
        }

        // Informations sur le panier
        $cart['cartTotalHT'] = $this->getCartTotalHT();
        $cart['cartTotalTTC'] = $this->getCartTotalTTC();
        $cart['cartTotalWeight'] = $this->getCartTotalWeight();
        $cart['cartTotalProductsCount'] = $this->getCartTotalProductsCount();

        return $cart;
    }

}
