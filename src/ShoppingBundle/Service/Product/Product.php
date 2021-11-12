<?php

namespace Shopping\Service\Product;

use Doctrine\Common\Persistence\ManagerRegistry;
use Shopping\Entity\AttributeGroup;
use Shopping\Entity\ProductImage;
use Shopping\Entity\ProductVariation;
use Shopping\Entity\ProductVariationAttribute;

class Product
{
    /**
     * ManagerRegistry
     *
     * @var ManagerRegistry
     */
    private $entityManager;

    /**
     * @var
     */
    private $product;

    /**
     * @var null
     */
    private $variation = null;

    /**
     * @var string[]
     */
    private $attributes = [];


    /**
     * Product constructor.
     *
     * @param ManagerRegistry $entityManager
     */
    public function __construct(ManagerRegistry $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Construction d'un produit complet avec ses déclinaisons
     *
     * @param integer $product_id
     * @param string[] $attributes
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function createProduct($product_id, $attributes = [])
    {
        // TODO Améliorer le système de création d'un produit au niveau de la construction ORM

        // Récupération en base de donnée du produit
        $this->product = $this->entityManager->getRepository(\Shopping\Entity\Product::class)->findWhere('entity.id = ' . $product_id, 1);

        if ($this->product == null) {
            throw new \Exception ('Impossible de trouver le produit', 404);
        }

        // Attributions des variations
        $variations = $this->entityManager->getRepository(ProductVariation::class)->findWhere('entity.product = ' . $this->product->getId());

        foreach ($variations as $variation) {
            $variation->setAttributes($this->entityManager->getRepository(ProductVariationAttribute::class)->findWhere('entity.variation = ' . $variation->getId()));
        }

        $this->product->setVariations($variations);


        // Attributions des images
        $images = $this->entityManager->getRepository(ProductImage::class)->findWhere('entity.product =' . $this->product->getId());

        foreach ($images as $image) {
            $this->product->addProductImage($image);
            if ($image->getUseAsCover()) {
                $this->product->setCover($image);
            }
        }


        // Recherche du produit par ses attributs
        if ($attributes != []) {
            $this->findByVariation($attributes);

            // Surcharge du prix du produit
            if($this->variation->getPriceHt() > 0){
                $this->product->setPriceHt($this->variation->getPriceHt());
            }

            // Surcharge par les caractéristiques de la déclinaison
        }


        return $this->product;
    }


    private function findByVariation($attributes)
    {
        $this->attributes = $attributes;

        if ($this->product->getVariations() != null) {

            foreach ($this->product->getVariations() as $variation) {
                $array = [];


                foreach ($variation->getAttributes() as $attribute) {

                    $item = $attribute->getAttribute();
                    $group = $item->getAttributeGroup();

                    if (!$group->getGroupRequired()) {
                        $array[$group->getId()] = $item->getId();
                    }


                }


                if (!is_array($this->attributes)) {
                    $this->attributes = json_decode(json_encode($this->attributes), true);
                }

                if ($array != [] && $this->attributes != [] && count(array_diff_assoc($array, $this->attributes)) == 0) {
                    $this->variation = $variation;
                }
            }

            return false;
        }
    }

    /**
     * Retourne le produit
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Retourne le tableau des attributs
     */
    public function getVariations()
    {
        return $this->attributes;
    }

    /**
     * Retourne la variation correspondant aux attributs
     */
    public function getSelectedVariation()
    {
        return $this->variation;
    }

}
