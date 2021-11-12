<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Catégorie de produit
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Shopping\Repository\CategoryRepository")
 * @ORM\Table(name="shopping_category")
 */
class Category
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Référence unique de la catégorie
     *
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

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
     * Parent de la catégorie
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(name="parent", referencedColumnName="id", nullable=true)
     */
    private $parent;

    /**
     * Sous-catégories de la catégorie
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent", cascade={"remove"})
     */
    private $children;

    /**
     * Produits appartenants à la catégorie
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="categories")
     */
    private $products;


    /**
     * @ORM\Column(type="boolean")
     */
    private $is_indexable;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $priority;

    /**
     * Slug de la catégorie
     *
     * @Gedmo\Slug(fields={"reference"})
     * @ORM\Column(length=128)
     */
    private $slug;


    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->children = new ArrayCollection();
        $this->products = new ArrayCollection();

        $this->setReference(uniqid());
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }


    /**
     * @return mixed
     */
    public function getIsIndexable()
    {
        return $this->is_indexable;
    }

    /**
     * @param mixed $is_indexable
     */
    public function setIsIndexable($is_indexable)
    {
        $this->is_indexable = $is_indexable;
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
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Category $parent
     */
    public function setParent(Category $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Category $child
     */
    public function addChild(Category $child)
    {
        $this->children[] = $child;
        $child->setParent($this);
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
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
     * Retourne L'URL personnalisé si elle existe sinon le slug par defaut
     */
    public function getSlug()
    {
        if ($this->getUrl() != '') {
            $slug = $this->getUrl();
        }else {
            $slug = $this->slug;
        }

        return $slug;
    }

    /**
     * @return string
     */
    public function __toString()
    {
            return (string)$this->getReference();
    }

}
