<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Caractéristique
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Shopping\Repository\FeatureRepository")
 * @ORM\Table(name="shopping_feature")
 */
class Feature
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Groupe de la caractéristique
     *
     * @ORM\ManyToOne(targetEntity="FeatureGroup", inversedBy="features")
     * @ORM\JoinColumn(name="feature_group", referencedColumnName="id", nullable=true)
     */
    private $feature_group;

    /**
     * Produits comportant cette caractéristique
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="features")
     */
    private $products;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->products = new ArrayCollection();
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
     * @return ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product $item
     */
    public function addProduct(Product $item)
    {
        $this->products[] = $item;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getDesignation();
    }
}