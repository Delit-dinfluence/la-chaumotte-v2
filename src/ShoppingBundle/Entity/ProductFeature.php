<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Caractéristique/Groupe d'un produit
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\ProductFeatureRepository")
 * @ORM\Table(name="shopping_product_feature")
 */
class ProductFeature
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Produit
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="product_features")
     * @ORM\JoinColumn(name="product", referencedColumnName="id", nullable=true)
     */
    private $product;

    /**
     * Groupe de caractéristiue
     *
     * @ORM\ManyToOne(targetEntity="FeatureGroup")
     * @ORM\JoinColumn(name="feature_group", referencedColumnName="id", nullable=true)
     */
    private $feature_group;

    /**
     * Caractéristique
     *
     * @ORM\ManyToOne(targetEntity="Feature")
     * @ORM\JoinColumn(name="feature", referencedColumnName="id", nullable=true)
     */
    private $feature;

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
    public function getFeatureGroup()
    {
        return $this->feature_group;
    }

    /**
     * @param mixed $feature_group
     */
    public function setFeatureGroup($feature_group): void
    {
        $this->feature_group = $feature_group;
    }

    /**
     * @return mixed
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * @param mixed $feature
     */
    public function setFeature($feature): void
    {
        $this->feature = $feature;
    }

}
