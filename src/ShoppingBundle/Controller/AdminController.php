<?php

namespace Shopping\Controller;

use Core\Controller\Traits\BaseAdminController;
use Core\Controller\Traits\BaseController;
use Shopping\Controller\Traits\BaseAdminShoppingController;
use Shopping\Controller\Traits\BaseShoppingController;
use Shopping\Entity\AddressTitleType;
use Shopping\Entity\AddressType;
use Shopping\Entity\Attribute;
use Shopping\Entity\AttributeGroup;
use Shopping\Entity\CartProduct;
use Shopping\Entity\Country;
use Shopping\Entity\DeliveryHome;
use Shopping\Entity\Feature;
use Shopping\Entity\FeatureGroup;
use Shopping\Entity\Order;
use Shopping\Entity\OrderAction;
use Shopping\Entity\Product;
use Shopping\Entity\ProductFile;
use Shopping\Entity\ProductImage;
use Shopping\Entity\ProductVariation;
use Shopping\Entity\ProductVariationAttribute;
use Shopping\Entity\Reduction;
use Shopping\Entity\ReductionCode;
use Shopping\Entity\ResearchConfiguration;
use Shopping\Entity\ResearchKeyword;
use Shopping\Entity\Tax;
use Shopping\Form\ProductType;
use Shopping\Form\ResearchConfigurationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/4DM1n157R4710N/shopping", name="shopping_admin_")
 */
class AdminController extends AbstractController
{
    use BaseController;
    use BaseAdminController;

    use BaseShoppingController;
    use BaseAdminShoppingController;

    /**
     * Nom du bundle
     */
    protected $bundle_name = 'shopping';

    public function product_form()
    {
        try {
            $request = $this->container->get('request_stack')->getCurrentRequest();

            $form = $this->generateEntityForm($request, Product::class, ProductType::class, $this->vars['id']);


            $variations = [];
            $groups = $this->getDoctrine()->getRepository(AttributeGroup::class)->findWhere('entity.is_enabled = 1');

            foreach ($groups as $group) {

                $variations[] = [
                    'variation' => $group,
                    'items' => $this->getDoctrine()->getRepository(Attribute::class)->findWhere('entity.is_enabled = 1 and entity.attribute_group = ' . $group->getId())
                ];
            }


            $array = [];
            $product_variations = $this->getDoctrine()->getRepository(ProductVariation::class)->findWhere('entity.product = ' . $this->vars['id']);

            foreach ($product_variations as $item) {
                $product_variation = [
                    'variation' => $item,
                    'attributes' => $this->getDoctrine()->getRepository(ProductVariationAttribute::class)->findwhere('entity.variation = ' . $item->getId())
                ];

                $array[] = $product_variation;
            }

            $images = $this->getDoctrine()->getRepository(ProductImage::class)->findWhere('entity.product = ' . $this->vars['id']);
            $files = $this->getDoctrine()->getRepository(ProductFile::class)->findWhere('entity.product = ' . $this->vars['id']);


            $taxes = $this->getDoctrine()->getRepository(Tax::class)->findBy([
                'is_enabled' =>  1
            ]);
            return $this->generateTemplate($this->vars['template'], [
                'variations' => $variations,
                'product_variations' => $array,
                'form_entity' => $form->createView(),
                'product_images' => $images,
                'product_files' => $files,
                'taxes' => $taxes
            ]);
        } catch (\Exception $e) {
            dump($e);
            die();
        }
    }

    /**
     * @Route("/product_save", name="product_save")
     */
    public function product_save(Request $request)
    {
        $form = $this->generateEntityForm($request, Product::class, ProductType::class, $request->request->get('product')['id']);

        $entity = $form->getData();

        return new JsonResponse([
            'entity_id' => $entity->getId()
        ], 200);
    }

    /**
     * @Route("/product_save_medal", name="product_save_medal")
     */
    public function product_medal(Request $request)
    {

        $id = $request->request->get('product_id');
        $baseFile = $request->request->get('medal_file');
        $remove = $request->request->get('medal_remove');

        $product = $this->getDoctrine()->getRepository(Product::class)->findWhere('entity.id = ' . $id, 1);

        if ($product != null) {

            if ($remove == 'true') {

                $reference = $product->getMedal();

                if ($reference != null) {
                    $output_file = __DIR__ . '/../../../public/assets/media/images/' . $reference;
                    unlink($output_file);
                }

            } else {

                if ($product->getMedal() == null) {
                    $reference = uniqid() . '.png';
                    $product->setMedal($reference);
                } else {
                    $reference = $product->getMedal();
                }

                $output_file = __DIR__ . '/../../../public/assets/media/images/' . $reference;

                if ($baseFile != null) {
                    $data = explode(',', $baseFile);

                    $ifp = fopen($output_file, 'wb');
                    fwrite($ifp, base64_decode($data[1]));
                    fclose($ifp);
                }
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $product->mergeNewTranslations();
            $em->flush();
        }

        return new JsonResponse([
            'entity_id' => $product->getId()
        ], 200);
    }

    /**
     * @Route("/product_save_file", name="product_save_file")
     */
    public function product_file(Request $request)
    {
        $informations = [
            'product_id' => $request->request->get('product_id'),
            'file_id' => $request->request->get('file_id'),
            'file_content' => $request->request->get('file'),
        ];

        $options = [
            'reference' => $request->request->get('reference'),
            'languages' => $request->request->get('languages'),
        ];

        // Vérification des informations reçues
        foreach ($informations as $information) {
            if ($information == null) {
                return new JsonResponse('Invalid informations', 422);
            }
        }

        $product = $this->getDoctrine()->getRepository(Product::class)->findOneBy([
            'id' => $informations['product_id']
        ]);

        if ($product != null) {

            $file = $this->getDoctrine()->getRepository(ProductFile::class)->findOneBy([
                'id' => $informations['file_id']
            ]);


            if ($file == null) {
                $file = new ProductFile();
                $product->addProductFile($file);
            }

            if ($file->getDocument() == null) {
                $reference = uniqid() . '.pdf';
                $file->setDocument($reference);
            }

            if ($options['reference'] != null) {
                $reference = $options['reference'];
                $file->setDocument($reference);
            }

            $reference = $file->getDocument();

            if($options['languages'] != null){
                $file->setLanguage($options['languages']);
            }

            $output_file = __DIR__ . '/../../../public/assets/media/files/' . $reference;

            if ($informations['file_content'] != null) {
                $data = explode(',', $informations['file_content']);

                $ifp = fopen($output_file, 'wb');
                fwrite($ifp, base64_decode($data[1]));
                fclose($ifp);
            }


        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $product->mergeNewTranslations();
        $em->flush();


        return new JsonResponse([
            'entity_id' => $product->getId()
        ], 200);
    }



    /**
     * @Route("/product_collection_remove", name="product_collection_remove")
     */
    public function product_collection_remove(Request $request)
    {
        $image_id = $request->request->get('image_id');

        $entity = $this->getDoctrine()->getRepository(ProductImage::class)->findWhere('entity.id = ' . $image_id, 1);

        if ($entity != null) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();
        }

        return new JsonResponse('', 200);
    }

    /**
     * @Route("/product_collection_save", name="product_collection_save")
     */
    public function product_collection_save(Request $request)
    {
        $id = $request->request->get('product');
        $baseFile = $request->request->get('file');
        $cover = $request->request->get('cover');
        $description = $request->request->get('description');
        $image_id = $request->request->get('image_id');

        $product = $this->getDoctrine()->getRepository(Product::class)->findWhere('entity.id = ' . $id, 1);

        if ($product != null) {
            if ($image_id == null || $image_id <= 0) {
                $entity = new ProductImage();

                $reference = uniqid() . '.png';
                $entity->setImage($reference);
                $entity->setProduct($product);

            } else {
                $entity = $this->getDoctrine()->getRepository(ProductImage::class)->findWhere('entity.id = ' . $image_id, 1);
                $reference = $entity->getImage();
            }

            $output_file = __DIR__ . '/../../../public/assets/media/images/' . $reference;

            if ($cover == '1') {
                $entity->setUseAsCover(true);
            } else {
                $entity->setUseAsCover(false);
            }

            $entity->translate('fr')->setAlt($description);


            if ($baseFile != null) {
                $data = explode(',', $baseFile);

                $ifp = fopen($output_file, 'wb');
                fwrite($ifp, base64_decode($data[1]));
                fclose($ifp);
            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $entity->mergeNewTranslations();
            $em->flush();
        }

        return new JsonResponse('', 200);
    }

    /**
     * @Route("/product_variation_save", name="product_variation_save")
     */
    public function variation(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $variations = $request->request->get('variations');
        $product_id = $request->request->get('id');

        $product = $this->getDoctrine()->getRepository(Product::class)->findWhere('entity.id = ' . $product_id, 1);


        $product_variations = $this->getDoctrine()->getRepository(ProductVariation::class)->findWhere('entity.product = ' . $product_id);
        foreach ($product_variations as $item_variation) {
            $variation_attributes = $this->getDoctrine()->getRepository(ProductVariationAttribute::class)->findWhere('entity.variation= ' . $item_variation->getId());
            foreach ($variation_attributes as $item_attribute) {
                $em->remove($item_attribute);
            }
            $em->remove($item_variation);
        }
        $em->flush();

        foreach ($variations as $variation) {

            if (!array_key_exists('price', $variation)) {
                break;
            }
            $entity = new ProductVariation();
            $entity->setProduct($product);
            $entity->setPriceHt($variation['price']);
            $entity->setStock($variation['price']);

            foreach ($variation['attributes'] as $attribute) {

                $array = explode('-', $attribute);
                $id = end($array);

                $attribute_entity = $this->getDoctrine()->getRepository(Attribute::class)->findWhere('entity.id = ' . $id, 1);

                $attribute = new ProductVariationAttribute();
                $attribute->setAttribute($attribute_entity);
                $entity->addAttribute($attribute);

                $em->persist($attribute);
            }
            $product->addVariation($entity);
            $em->persist($entity);
        }

        $em->persist($product);
        $em->flush();


        return new JsonResponse('', 200);
    }

    /**
     * @Route("/features_attributes", name="features_attributes")
     */
    public function features_attributes()
    {
        $attributes = $this->getDoctrine()->getRepository(AttributeGroup::class)->findAll();
        $features = $this->getDoctrine()->getRepository(FeatureGroup::class)->findAll();

        return $this->generateTemplate('@shopping/admin/theme/features_attributes', [
            'admin_entity_settings' => $this->configuration_from_file['attributes_features'],

            'attributes_settings' => $this->configuration_from_file['attribute_group'],
            'attributes' => $attributes,
            'attribute' => new Attribute(),

            'features_settings' => $this->configuration_from_file['feature_group'],
            'features' => $features,
            'feature' => new Feature(),

            'action' => 'list'
        ]);
    }

    /**
     * Monitoring des produits, catégories, ...
     *
     * @Route("/monitoring", name="monitoring")
     */
    public function monitoring()
    {
        $this->vars['unavailable'] = $this->getDoctrine()->getRepository(Product::class)->findWhere('entity.is_enabled = 0');

        return $this->generateTemplate('@shopping/admin/theme/monitoring', [

        ]);
    }

    /**
     * Statistiques sur les produits, catégories, ...
     *
     * @Route("/statistics", name="statistics")
     */
    public function statistics()
    {
        return $this->generateTemplate('@shopping/admin/theme/statistics', [

        ]);
    }

    /**
     * Gestion des promotions et réductions (catégories, produits, codes, ...)
     *
     * @Route("/reductions", name="reductions")
     */
    public function reductions()
    {

        $reductions = $this->getDoctrine()->getRepository(Reduction::class)->findAll();
        $codes = $this->getDoctrine()->getRepository(ReductionCode::class)->findAll();

        return $this->generateTemplate('@shopping/admin/theme/reductions', [
            'reductions_settings' => $this->configuration_from_file['reduction'],
            'reductions' => $reductions,
            'reduction' => new Reduction(),

            'codes_settings' => $this->configuration_from_file['reduction_code'],
            'codes' => $codes,
            'code' => new ReductionCode(),
        ]);
    }

    /**
     * @Route("/locations", name="locations")
     */
    public function locations()
    {
        return $this->generateTemplate('@shopping/admin/theme/locations', [
            'entities' => $this->actionEntityList(Product::class)
        ]);
    }

    public function research_configuration(Request $request)
    {
        $content = $this->getConfigurationFromFile(self::BUNDLE_NAME);

        $form = $this->generateEntityForm($request, ResearchConfiguration::class, ResearchConfigurationType::class, 1);
        $searches = $this->getDoctrine()->getRepository(ResearchKeyword::class)->findAll();


        return $this->generateTemplate('@shopping/admin/theme/research', [
            'form_entity' => $form->createView(),

            'searches_settings' => $content['research_keyword'],
            'searches' => $searches,
            'search' => new ResearchKeyword(),
        ]);


    }


    public function order_form(Request $request)
    {
        try {
            if ($this->cart_manager == null) {
                $this->initializeShoppingController($request);
            }


            $this->vars = array_merge($request->request->get('vars'), $this->vars);

            $logs = $this->getDoctrine()->getRepository(OrderAction::class)->findAll();

            $id = $this->vars['id'];

            $this->vars['order'] = $order = $this->getDoctrine()->getRepository(Order::class)->find($id);

            foreach ($order->getAddress() as $address) {
                if ($address->getAddressType() == AddressType::INVOICE) {
                    $this->vars['address_invoice'] = $address_invoice = $address;
                } elseif ($address->getAddressType() == AddressType::DELIVERY) {
                    $this->vars['address_delivery'] = $address_delivery = $address;
                }
            }


            $this->vars['delivery_home'] = $this->getDoctrine()->getRepository(DeliveryHome::class)->findWhere('entity.id = 1', 1);

            $this->vars['cart'] = $cart = $order->getCart();
            $products = $this->getDoctrine()->getRepository(CartProduct::class)->findWhere('entity.cart = ' . $cart->getId());

            foreach ($products as $product) {
                $item = $this->findProduct($product->getProduct()->getId());
                $product->setProduct($item);


                $attributes = [];
                foreach (json_decode($product->getAttributes()) as $obj) {

                    $group = $this->getDoctrine()->getRepository(AttributeGroup::class)->findWhere('entity.id = ' . $obj->group, 1);

                    if ($group->getGroupRequired() == true) {
                        $value = $obj->value;
                    } else {
                        $value = $this->getDoctrine()->getRepository(Attribute::class)->findWhere('entity.id = ' . $obj->value, 1);
                    }

                    $attributes[] = [
                        'group' => $group,
                        'value' => $value
                    ];

                }

                $product->setAttributes($attributes);


                $this->vars['products'][] = $product;
            }


            $this->vars['invoice_title'] = AddressTitleType::getTypeName($address_invoice->getTitle());
            $this->vars['delivery_title'] = AddressTitleType::getTypeName($address_delivery->getTitle());

            $this->vars['order'] = $this->order_manager->getObjectOrder();

            return $this->generateTemplate($this->vars['template'], [
                'log' => new OrderAction(),
                'logs' => $logs,
                'logs_settings' => $this->configuration_from_file['order_action'],
            ]);

        } catch (\Exception $e) {
            dump($e);
            die();
        }
    }

}
