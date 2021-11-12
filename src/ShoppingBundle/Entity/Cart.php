<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Panier de produits
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\CartRepository")
 * @ORM\Table(name="shopping_cart")
 */
class Cart
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Référence unique du panier
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $reference;

    /**
     * Produits du panier
     *
     * @ORM\OneToMany(targetEntity="CartProduct", mappedBy="cart",cascade={"persist", "remove"})
     */
    private $products;

    /**
     * Commande à laquelle est associée le panier
     *
     * @ORM\OneToOne(targetEntity="Order", mappedBy="cart")
     */
    private $order;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->products = new ArrayCollection();

        $this->setReference(uniqid());
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
     *
     * @return ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     *
     * @param CartProduct $item
     */
    public function addCartProduct(CartProduct $item)
    {
        $this->products[] = $item;
        $item->setCart($this);
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order): void
    {
        $this->order = $order;
    }


    public function getTotalHT()
    {
        $total_ht = 0;

        foreach($this->getProducts() as $product){
            $total_ht += $product->getPriceHt();
        }

        return $total_ht;
    }

    public function getTotalTTC()
    {
        $total_ttc = 0;

        foreach($this->getProducts() as $product){
            $total_ttc += $product->getPriceTtc();
        }

        return $total_ttc;
    }

}
