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
 * @ORM\Entity(repositoryClass="Shopping\Repository\ProductVariationAttributeRepository")
 * @ORM\Table(name="shopping_product_variation_attribute")
 */
class ProductVariationAttribute
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }


    /**
     * @ORM\ManyToOne(targetEntity="Attribute", inversedBy="variations")
     * @ORM\JoinColumn(name="attribute", referencedColumnName="id", nullable=true)
     */
    private $attribute;

    /**
     * @ORM\ManyToOne(targetEntity="ProductVariation", inversedBy="attributes")
     * @ORM\JoinColumn(name="variation", referencedColumnName="id", nullable=true)
     */
    private $variation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $value;

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
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param mixed $attribute
     */
    public function setAttribute($attribute): void
    {
        $this->attribute = $attribute;
    }

    /**
     * @return mixed
     */
    public function getVariation()
    {
        return $this->variation;
    }

    /**
     * @param mixed $variation
     */
    public function setVariation($variation): void
    {
        $this->variation = $variation;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

}
