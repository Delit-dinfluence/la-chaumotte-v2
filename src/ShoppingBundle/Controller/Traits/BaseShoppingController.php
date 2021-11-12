<?php

namespace Shopping\Controller\Traits;

use Core\Controller\BaseAdminController;
use Core\Controller\BaseController;
use Shopping\Entity\Attribute;
use Shopping\Entity\AttributeGroup;
use Shopping\Entity\Order;
use Shopping\Entity\OrderConfiguration;
use Shopping\Entity\Product;
use Shopping\Entity\ProductConfiguration;
use Shopping\Entity\ProductFile;
use Shopping\Entity\ProductImage;
use Shopping\Entity\ProductImageAside;
use Shopping\Entity\ProductVariation;
use Shopping\Entity\ProductVariationAttribute;
use Shopping\Entity\ResearchConfiguration;
use Shopping\Entity\ShopConfiguration;
use Core\Service\History\HistoryMessage;
use Shopping\Service\Cart\Cart;
use Shopping\Service\Cart\CartManager;
use Shopping\Service\Order\OrderManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

trait BaseShoppingController
{
    /**
     * Panier
     */
    protected $cart_manager;

    /**
     * Commande
     */
    protected $order_manager;

    /**
     * Initialise la gestion du panier
     */
    public function initializeShoppingController(Request $request)
    {
        // Chargement des configurations
        $this->vars['shop_configuration'] = $this->getDoctrine()->getRepository(ShopConfiguration::class)->findWhere('entity.id = 1', 1);
        $this->vars['order_configuration'] = $this->getDoctrine()->getRepository(OrderConfiguration::class)->findWhere('entity.id = 1', 1);
        $this->vars['product_configuration'] = $this->getDoctrine()->getRepository(ProductConfiguration::class)->findWhere('entity.id = 1', 1);

        // Création du panier
        $this->cart_manager = new CartManager($this->session, $this->getDoctrine());
        $this->order_manager = new OrderManager($this->session, $this->getDoctrine());
    }

    public function findAttributes()
    {
        $array = [];

        $attribute_groups = $this->getDoctrine()->getRepository(AttributeGroup::class)->findWhere('entity.is_enabled = 1');
        foreach ($attribute_groups as $attribute_group) {
            $array[] = [
                'group' => $attribute_group,
                'attributes' => $this->getDoctrine()->getRepository(Attribute::class)->findWhere('entity.is_enabled = 1 AND entity.attribute_group = ' . $attribute_group->getid())
            ];
        }

        return $array;
    }

    /**
     * Recherche et retourne un object "Order"
     */
    public function findOrder($id)
    {
        $order = $this->getDoctrine()->getRepository(Order::class)->find($this->vars['id']);

        return $order;
    }

    /**
     * Recherche des produits en utilisant une catégorie
     */
    public function findProductByCategory($category)
    {
        $products = $products = $this->getDoctrine()->getRepository(Product::class)
            ->findByCategory($category);

        $results = [];
        foreach ($products as $product) { // Assemble les produits trouvés
            $results[] = $this->createProduct($product);
        }

        // Retourne les produits de la catégorie
        return $results;
    }

    /**
     * Recherche et retourne un object "Product"
     */
    public function findProduct($slug)
    {

        if (is_integer($slug)) { // Recherche un produit avec son "slug == Identifiant"
            $this->vars['product'] = $product = $this->getDoctrine()->getRepository(Product::class)
                ->findWhere('entity.id = ' . $slug, 1);

        } else { // Sinon recherche un produit avec son "slug == URI"
            $this->vars['product'] = $product = $this->getDoctrine()->getRepository(Product::class)
                ->findByUri($slug);

            if ($product == []) { // Sinon Recherche un produit avec son "slug == Reference"
                $this->vars['product'] = $product = $this->getDoctrine()->getRepository(Product::class)
                    ->findByReference($slug);
            }
        }

        // Vérifie la mise en ligne du produit
        if (!$product->getIsEnabled()) {
            return null;
        }

        // Assemble le produit avec tous ses composants
        return $this->createProduct($product);
    }

    /**
     * Assemble un object "Product"
     */
    private function createProduct($product)
    {
        // Attribue les variations relatives dau produit
        $variations = $this->getDoctrine()->getRepository(ProductVariation::class)
            ->findWhere('entity.product = ' . $product->getId());

        foreach ($variations as $variation) {
            $attributes = $this->getDoctrine()->getRepository(ProductVariationAttribute::class)
                ->findWhere('entity.variation = ' . $variation->getId());

            $variation->setAttributes($attributes);
        }

        // Attribue les images relatives au produit
        $images = $this->getDoctrine()->getRepository(ProductImage::class)
            ->findWhere('entity.product =' . $product->getId());

        foreach ($images as $image) {
            $product->addProductImage($image);

            if ($image->getUseAsCover()) {
                $product->setCover($image);
            }
        }

        // Attribue les images asides relatives au produit
        $asides = $this->getDoctrine()->getRepository(ProductImageAside::class)
            ->findWhere('entity.product =' . $product->getId());

        foreach ($asides as $item) {
            $product->addProductAside($item);
        }



        // Attribue les fichiers relatifs au produit
        $files = $this->getDoctrine()->getRepository(ProductFile::class)
            ->findWhere('entity.product =' . $product->getId());

        foreach ($files as $file) {
            $product->addProductFile($file);
        }


        $product->setVariations($variations);


        if (key_exists('languages', $this->vars)) {
            $uris = [];
            foreach ($this->vars['languages'] as $language) {
                $code = $language->getIsoCode();

                $uris[$code] = $product->translate($code)->getUri();

            }

            $product->setUris($uris);
        }

        return $product;
    }

}
