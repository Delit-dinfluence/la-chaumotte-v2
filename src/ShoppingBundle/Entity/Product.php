<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\PageTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManagerAware;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Enumération des type de produit
 */
abstract class ProductType extends Enum
{
    const STANDARD = 0;
    const VARIATION = 1;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::STANDARD => 'Standard',
        self::VARIATION => 'Avec déclinaisons',
    ];

}

/**
 * Enumération des redirection de produit
 */
abstract class ProductRedirect extends Enum
{
    const NO_REDIRECTION = 0;
    const TEMPORARY_PRODUCT = 1;
    const PERMANENT_PRODUCT = 2;
    const TEMPORARY_CATEGORY = 3;
    const PERMANENT_CATEGORY = 4;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::NO_REDIRECTION => 'Aucune redirection (404)',
        self::TEMPORARY_PRODUCT => 'Temporaire vers un produit (301)',
        self::PERMANENT_PRODUCT => 'Permanent vers un produit (302)',
        self::TEMPORARY_CATEGORY => 'Temporaire vers une catégorie (301)',
        self::PERMANENT_CATEGORY => 'Permanent vers une catégorie (301)',
    ];

}

/**
 * Produit
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Shopping\Repository\ProductRepository")
 * @ORM\Table(name="shopping_product")
 */
class Product implements ObjectManagerAware
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }
    use PageTrait {
        PageTrait::__construct as private __pageConstruct;
    }

    /**
     * Référence unique du produit
     *
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * Type de produit (Standard, Avec déclinaisons, ...)
     *
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_indexable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $priority;

    /**
     * Prix HT
     *
     * @ORM\Column(type="float")
     */
    private $price_ht;

    /**
     * Poids
     *
     * @ORM\Column(type="float")
     */
    private $weight;

    /**
     * Type de redirection si le produit est hors ligne
     *
     * @ORM\Column(type="integer")
     */
    private $redirect;

    /**
     * Valeur de la redirection
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $redirect_link;

    /**
     * Catégories du produit
     *
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="products")
     */
    private $categories;

    /**
     * Liste de produit en relations
     *
     * @ORM\ManyToMany(targetEntity="Product")
     */
    private $related_products;

    /**
     * Caractéristiques du produit
     *
     * @ORM\OneToMany(targetEntity="ProductVariation", mappedBy="product", cascade={"persist", "remove"})
     */
    private $variations;

    private $attributes_group;

    private $cover;

    /**
     * Produits comportant cette caractéristique
     *
     * @ORM\ManyToMany(targetEntity="Feature", inversedBy="products")
     */
    private $features;

    /**
     * Caractéristiques du produit
     *
     * @ORM\OneToMany(targetEntity="ProductImage", mappedBy="product", cascade={"persist", "remove"})
     */
    private $product_images;

    /**
     * Fichiers joints au produit
     *
     * @ORM\OneToMany(targetEntity="ProductFile", mappedBy="product", cascade={"persist", "remove"})
     */
    private $product_files;

    /**
     * Caractéristiques du produit
     *
     * @ORM\OneToMany(targetEntity="ProductFeature", mappedBy="product", cascade={"persist", "remove"})
     */
    private $product_features;

    /**
     * Taxe à appliquer (TVA, ...)
     *
     * @ORM\ManyToOne(targetEntity="Tax", inversedBy="products")
     * @ORM\JoinColumn(name="tax", referencedColumnName="id", nullable=true)
     */
    private $tax;

    /**
     * Stock
     *
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * Slug
     *
     * @Gedmo\Slug(fields={"reference"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;


    private $uris;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $medal;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="medal")
     * @var File
     */
    private $medalFile;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();
        $this->__pageConstruct();

        $this->categories = new ArrayCollection();
        $this->product_features = new ArrayCollection();
        $this->product_images = new ArrayCollection();
        $this->product_files = new ArrayCollection();
        $this->related_products = new ArrayCollection();
//        $this->variations = new ArrayCollection();

        $this->setReference(uniqid());
        $this->setStock(0);
        $this->setWeight(0);
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
     * @return string
     */
    public function getMedal()
    {
        return $this->medal;
    }

    /**
     * @param string $medal
     */
    public function setMedal($medal)
    {
        $this->medal = $medal;
    }

    /**
     * @return File
     */
    public function getMedalFile()
    {
        return $this->medalFile;
    }

    /**
     * @param File $medalFile
     */
    public function setMedalFile($medalFile)
    {
        $this->medalFile = $medalFile;

        if ($medalFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }


    public function getCover()
    {
        return $this->cover;
    }

    public function setCover($item)
    {
        $this->cover = $item;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPriceHt()
    {
        return $this->price_ht;
    }


    public function getPriceTTC()
    {
        return $this->getPriceHt() * ( 1 + ($this->getTax()->getRate() / 100));
    }

    /**
     * @param mixed $price_ht
     */
    public function setPriceHT($price_ht): void
    {
        $this->price_ht = $price_ht;
    }

    /**
     * @return mixed
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * @param mixed $redirect
     */
    public function setRedirect($redirect): void
    {
        $this->redirect = $redirect;
    }

    /**
     * @return mixed
     */
    public function getRedirectLink()
    {
        return $this->redirect_link;
    }

    /**
     * @param mixed $redirect_link
     */
    public function setRedirectLink($redirect_link): void
    {
        $this->redirect_link = $redirect_link;
    }

    /**
     * @return ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category $item
     */
    public function addCategory(Category $item)
    {
        $this->categories[] = $item;
        $item->addProduct($this);
    }

    /**
     * @return ArrayCollection
     */
    public function getRelatedProducts()
    {
        return $this->related_products;
    }


    /**
     * @param Product $item
     */
    public function addRelatedProduct(Product $item)
    {
        $this->related_products[] = $item;
        $item->addRelatedProduct($this);
    }

    /**
     *
     * @return ArrayCollection
     */
    public function getVariations()
    {
        return $this->variations;
    }

    public function setVariations($variations)
    {
        foreach ($variations as $variation) {
            $this->addVariation($variation);
        }
    }

    /**
     *
     * @param ProductVariation $item
     */
    public function addVariation(ProductVariation $item)
    {
        $this->variations[] = $item;
        $item->setProduct($this);
    }

    /**
     * @return ArrayCollection
     */
    public function getProductFeatures()
    {
        return $this->product_features;
    }

    /**
     * @return mixed
     */
    public function getProductImages()
    {
        return $this->product_images;
    }

    /**
     * @param ProductImage $item
     */
    public function addProductImage($item)
    {
        $this->product_images[] = $item;
    }

    /**
     * @return mixed
     */
    public function getProductFiles()
    {
        return $this->product_files;
    }

    /**
     * @param ProductFile $item
     */
    public function addProductFile($item)
    {
        $this->product_files[] = $item;
        $item->setProduct($this);
    }

    /**
     * @param $features
     */
    public function setProductFeatures($features)
    {
        // Suppression des caractéristiques
        foreach ($this->product_features as $feature) {
            $this->em->remove($feature);
        }

        // Ajout des caractéristiques
        foreach ($features as $feature) {
            $feature->setProduct($this);
        }

        $this->product_features = $features;
    }

    /**
     *
     * @param ProductFeature $item
     */
    public function addProductFeature(ProductFeature $item)
    {
        $this->product_features[] = $item;
        $item->setProduct($this);
    }

    /**
     * @return mixed
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param mixed $tax
     */
    public function setTax($tax): void
    {
        $this->tax = $tax;
    }

    /**
     * Retourne L'URL personnalisé si elle existe sinon le slug par defaut
     *
     * @return mixed
     */
    public function getSlug()
    {
        if ($this->getUri() != '') {
            $slug = $this->getUri();
        } else {
            $slug = $this->slug;
        }

        return $slug;
    }


    public function getAttributesGroup()
    {
        $groups = [];

        foreach ($this->getVariations() as $attribute) {
            foreach ($attribute->getAttributes() as $item) {
                $object = $item->getAttribute();
                $groups[$object->getAttributeGroup()->getId()] = $object->getDesignation();

            }
        }

        return $groups;
    }

    /**
     * @return mixed
     */
    public function getUris()
    {
        return $this->uris;
    }

    /**
     * @param mixed $uris
     */
    public function setUris($uris)
    {
        $this->uris = $uris;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }


    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getDesignation();
    }


}
