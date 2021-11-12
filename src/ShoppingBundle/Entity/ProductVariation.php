<?php

namespace Shopping\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Déclinaison de produit
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Shopping\Repository\ProductVariationRepository")
 * @ORM\Table(name="shopping_product_variation")
 */
class ProductVariation
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Prix HT
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $price_ht;

    /**
     * Stock
     *
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * Caractéristiques du produit
     *
     * @ORM\OneToMany(targetEntity="ProductVariationAttribute", mappedBy="variation", cascade={"persist", "remove"})
     */
    private $attributes;

    /**
     * Produit
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="variations")
     * @ORM\JoinColumn(name="product", referencedColumnName="id", nullable=true)
     */
    private $product;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->attributes = new ArrayCollection();
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
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return ArrayCollection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @param ProductVariationAttribute $item
     */
    public function addAttribute(ProductVariationAttribute $item)
    {
        $this->attributes[] = $item;
        $item->setVariation($this);
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
