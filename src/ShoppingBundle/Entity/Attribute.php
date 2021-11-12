<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Attribut
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Shopping\Repository\AttributeRepository")
 * @ORM\Table(name="shopping_attribute")
 */
class Attribute
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Groupe de l'attribut
     *
     * @ORM\ManyToOne(targetEntity="AttributeGroup", inversedBy="attributes")
     * @ORM\JoinColumn(name="attribute_group", referencedColumnName="id", nullable=true)
     */
    private $attribute_group;

    /**
     * Caractéristiques du produit
     *
     * @ORM\OneToMany(targetEntity="ProductVariationAttribute", mappedBy="attribute", cascade={"persist", "remove"})
     */
    private $variations;


    /**
     * Image de la catégorie
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->variations = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getAttributeGroup()
    {
        return $this->attribute_group;
    }

    /**
     * @param mixed $attribute_group
     */
    public function setAttributeGroup($attribute_group): void
    {
        $this->attribute_group = $attribute_group;
    }

    /**
     * @return ArrayCollection
     */
    public function getVariations()
    {
        return $this->variations;
    }

    /**
     * @param ProductVariation $item
     */
    public function addVariation(ProductVariation $item)
    {
        $this->variations[] = $item;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(?string $image)
    {
        $this->image = $image;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     * @throws \Exception
     */
    public function setImageFile(File $imageFile)
    {
        $this->imageFile = $imageFile;

        if ($imageFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

}
