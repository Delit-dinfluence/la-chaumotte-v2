<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\FileFormat;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Enumération des types d'affichage du groupe
 */
abstract class AttributePrintType extends Enum
{
    const LIST_RADIO = 0;
    const LIST_SELECT = 1;
    const INPUT_FILE = 2;
    const INPUT_TEXT = 3;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::LIST_RADIO => 'Radio',
        self::LIST_SELECT => 'Select',
        self::INPUT_FILE => 'Téléchargement de fichier',
        self::INPUT_TEXT => 'Input text',
    ];

}

/**
 * Groupe d'attributs
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Shopping\Repository\AttributeGroupRepository")
 * @ORM\Table(name="shopping_attribute_group")
 */
class AttributeGroup
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Type d'affichage
     *
     * @ORM\Column(type="integer")
     */
    private $print_type;

    /**
     * Type d'affichage
     *
     * @ORM\Column(type="boolean")
     */
    private $group_required;

    /**
     * Attributs du groupe
     *
     * @ORM\OneToMany(targetEntity="Attribute", mappedBy="attribute_group", cascade={"persist", "remove"})
     */
    private $attributes;

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
     * @ORM\ManyToMany(targetEntity="Core\Entity\FileFormat")
     */
    private $formats;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->formats = new ArrayCollection();


        $this->attributes = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getGroupRequired()
    {
        return $this->group_required;
    }

    /**
     * @param mixed $group_required
     */
    public function setGroupRequired($group_required): void
    {
        $this->group_required = $group_required;
    }


    public function getFormats(){
        return $this->formats;
    }


    /**
     * @param FileFormat $user
     */
    public function addUser(FileFormat $item)
    {
        if ($this->formats->contains($item)) {
            return;
        }
        $this->formats->add($item);
    }
    /**
     * @param FileFormat $user
     */
    public function removeUser(FileFormat $item)
    {
        if (!$this->formats->contains($item)) {
            return;
        }
        $this->formats->removeElement($item);
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

    /**
     * @return mixed
     */
    public function getPrintType()
    {
        return $this->print_type;
    }

    /**
     * @param mixed $print_type
     */
    public function setPrintType($print_type): void
    {
        $this->print_type = $print_type;
    }

    /**
     *
     * @return ArrayCollection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     *
     * @param Attribute $item
     */
    public function addAttribute(Attribute $item)
    {
        $this->attributes[] = $item;
        $item->setAttributeGroup($this);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getDesignation();
    }

}
