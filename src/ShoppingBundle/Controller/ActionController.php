<?php

namespace Shopping\Controller;

use Core\Controller\Traits\BaseController;
use Core\Entity\CheckType;
use Core\Entity\CheckValidator;
use Core\Entity\ErrorCode;
use Sender\Service\Email\Mailer;
use Shopping\Controller\Traits\BaseShoppingController;
use Shopping\Entity\AddressTitleType;
use Shopping\Entity\AddressType;
use Shopping\Entity\Attribute;
use Shopping\Entity\AttributeGroup;
use Shopping\Entity\Cart;
use Shopping\Entity\CartProduct;
use Shopping\Entity\Country;
use Shopping\Entity\CustomerAddress;
use Shopping\Entity\DeliveryHome;
use Shopping\Entity\DeliveryMethod;
use Shopping\Entity\Order;
use Shopping\Entity\OrderAction;
use Shopping\Entity\OrderStatus;
use Shopping\Entity\PaymentMethod;
use Shopping\Entity\Product;
use Shopping\Service\Payment\PaymentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cart", name="shopping_")
 */
class ActionController extends AbstractController
{
    use BaseController;
    use BaseShoppingController;

    const SESSION_ORDER_KEY = 'shopping_order';

    private $paymentManager;

    /**
     * Retourne le panier
     *
     * @Route ("/ajax/cart/get", name="cart_get")
     */
    public function getCart(Request $request)
    {
        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::SUCCESS),
            'code' => ErrorCode::SUCCESS,
            'content' => [
                'cart' => $this->cart_manager->getCart()
            ]
        ], 200);
    }

    /**
     * Ajoute un produit au panier
     *
     * @Route ("/ajax/cart/product/add", name="cart_product_add")
     */
    public function addProduct(Request $request)
    {
        $informations = [
            'product_id' => CheckValidator::sanitize($request->query->get('product_id'), CheckType::INTEGER),
            'quantity' => CheckValidator::sanitize($request->query->get('quantity'), CheckType::INTEGER),
        ];

        $options = [
            'attributes' => CheckValidator::sanitize($request->query->get('attributes'), CheckType::STRING),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        // Définition des attributs du produit
        $array_attributes = [];
        if ($options['attributes']['value'] != null) {
            foreach ($options['attributes']['value'] as $attribute) {
                $array_attributes[$attribute['attribute']['value']] = $attribute['value'];
            }
        }

        // Création du produit
        $product = new \Shopping\Service\Product\Product($this->getDoctrine());
        $product->createProduct($informations['product_id']['value'], $array_attributes);

        // ECHEC - Le produit n'existe pas
        if ($product == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::PRODUCT_NOT_FOUND),
                'code' => ErrorCode::PRODUCT_NOT_FOUND,
                'content' => []
            ], 404);
        }

        // Ajout du produit au panier
        $this->cart_manager->add($product, $informations['quantity']['value']);

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::SHOPPING_PRODUCT_ADDED),
            'code' => ErrorCode::SHOPPING_PRODUCT_ADDED,
            'content' => [
                'cart' => $this->cart_manager->getCart()
            ]
        ], 200);
    }

    /**
     * Mise à jours d'un produit du panier
     *
     * @Route ("/ajax/cart/product/update", name="cart_product_update")
     */
    public function updateProduct(Request $request)
    {
        $informations = [
            'product_id' => CheckValidator::sanitize($request->query->get('product_id'), CheckType::INTEGER),
            'quantity' => CheckValidator::sanitize($request->query->get('quantity'), CheckType::INTEGER),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        $product = $this->getDoctrine()->getRepository(Product::class)->findOneBy([
            'id' => $informations['product_id']['value'],
            'is_enabled' => 1
        ]);

        // ECHEC - Le produit n'existe pas
        if ($product == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::PRODUCT_NOT_FOUND),
                'code' => ErrorCode::PRODUCT_NOT_FOUND,
                'content' => []
            ], 404);
        }

        $item = new \Shopping\Service\Product\Product($this->getDoctrine());
        $item->createProduct($product->getId());


        // Mise à jour du produit
        $this->cart_manager->update($item, $informations['quantity']['value']);



        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::SHOPPING_PRODUCT_UPDATED),
            'code' => ErrorCode::SHOPPING_PRODUCT_UPDATED,
            'content' => [
                'cartTotalHT' => $this->cart_manager->getProductRowTotalHTByProductId($product->getId()),
                'cartTotalTTC' => $this->cart_manager->getProductRowTotalTTCByProductId($product->getId()),
                'cartTotalWeight' => $this->cart_manager->getProductRowTotalWeightByProductId($product->getId()),
                'cartTotalProductsCount' => $this->cart_manager->getProductRowTotalCountByProductId($product->getId()),
                'cart' => $this->cart_manager->getCart()
            ]
        ], 200);
    }

    /**
     * Supprime un produit du panier
     *
     * @Route ("/ajax/cart/product/remove", name="cart_product_remove")
     */
    public function removeProduct(Request $request)
    {
        $informations = [
            'product_id' => CheckValidator::sanitize($request->query->get('product_id'), CheckType::INTEGER),
            'quantity' => CheckValidator::sanitize($request->query->get('quantity'), CheckType::INTEGER),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        $product = $this->getDoctrine()->getRepository(Product::class)->findOneBy([
            'id' => $informations['product_id']['value'],
            'is_enabled' => 1
        ]);

        // ECHEC - Le produit n'existe pas
        if ($product == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::PRODUCT_NOT_FOUND),
                'code' => ErrorCode::PRODUCT_NOT_FOUND,
                'content' => []
            ], 404);
        }

        // Suppression du produit
        $this->cart_manager->remove($product, $informations['quantity']['value']);

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::SHOPPING_PRODUCT_REMOVED),
            'code' => ErrorCode::SHOPPING_PRODUCT_REMOVED,
            'content' => [
                'cartTotalHT' => $this->cart_manager->getProductRowTotalHTByProductId($product->getId()),
                'cartTotalTTC' => $this->cart_manager->getProductRowTotalTTCByProductId($product->getId()),
                'cartTotalWeight' => $this->cart_manager->getProductRowTotalWeightByProductId($product->getId()),
                'cartTotalProductsCount' => $this->cart_manager->getProductRowTotalCountByProductId($product->getId()),
                'cart' => $this->cart_manager->getCart()
            ]
        ], 200);
    }

    /**
     * Définition de la méthode de livraison
     *
     * @Route ("/ajax/delivery/choose", name="choose_delivery_method")
     */
    public function chooseDeliveryMethod(Request $request)
    {
        $this->initializeController($request);

        $informations = [
            'delivery_id' => CheckValidator::sanitize($request->query->get('delivery_id'), CheckType::INTEGER),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        $item = $this->getDoctrine()->getRepository(DeliveryMethod::class)
            ->find($informations['delivery_id']['value']);

        // ECHEC - La moyen de livraison n'existe pas
        if ($item == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::ENTITY_NOT_FOUND),
                'code' => ErrorCode::ENTITY_NOT_FOUND,
                'content' => []
            ], 404);
        }

        $cart = $this->cart_manager->getCart();

        $class = $item->getControllerModule() . '\Entity\\' . $item->getControllerEntity();
        $delivery = $this->getDoctrine()->getRepository($class)->find(1);

        $this->order_manager->setDeliveryMethod([
            'delivery_method' => $informations['delivery_id']['value'],
            'delivery_method_name' => $item->getReference()
        ]);

        $this->order_manager->updateDeliveryPrice($cart['cartTotalProductsCount'], $cart['cartTotalHT'], $cart['cartTotalWeight']);
        $this->order_manager->updateCartPrice($cart['cartTotalTTC']);

        $template_name = strtolower(trim(preg_replace('/([A-Z])/', '_$1', $item->getControllerEntity()), '_'));

        $template = $this->renderView('@app/shopping/delivery/' . $template_name . '.html.twig', array_merge($this->vars, [
            'delivery' => $delivery,
            'account' => $this->vars['account'],
        ]), true);


        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => [
                'template' => $template,
                'cart' => $cart,
                'order' => $this->order_manager->getOrder(),
            ], 200]);
    }

    /**
     * Définition de l'adresse de livraison
     *
     * @Route ("/ajax/address/choose/delivery", name="choose_address_delivery")
     */
    public function chooseAddressDelivery(Request $request)
    {
        $informations = [
            'address_id' => CheckValidator::sanitize($request->query->get('address_id'), CheckType::INTEGER),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        $address = $this->getDoctrine()->getRepository(CustomerAddress::class)
            ->find($informations['address_id']['value']);

        $this->order_manager->setAddressDelivery([
            'address' => $address,
        ]);

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => [
            ], 200]);
    }

    /**
     * Définition de l'adresse de facturation
     *
     * @Route ("/ajax/address/choose/invoice", name="choose_address_invoice")
     */
    public function chooseAdressInvoice(Request $request)
    {
        $informations = [
            'address_id' => CheckValidator::sanitize($request->query->get('address_id'), CheckType::INTEGER),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        $address = $this->getDoctrine()->getRepository(CustomerAddress::class)
            ->find($informations['address_id']['value']);

        $this->order_manager->setAddressInvoice([
            'address' => $address,
        ]);

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => [
            ], 200]);
    }

    /**
     * Définition de la méthode de paiement
     *
     * @Route ("/ajax/payment/choose", name="choose_payment_method")
     */
    public function choosePaymentMethod(Request $request)
    {
        $this->initializeController($request);

        $informations = [
            'payment_id' => CheckValidator::sanitize($request->query->get('payment_id'), CheckType::INTEGER),
        ];

        //  Validation des informations reçues
        $validate = CheckValidator::validate($informations);

        // ECHEC - Le formulaire contient des erreurs
        if ($validate['isError']) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::FORM_INVALID),
                'code' => ErrorCode::FORM_INVALID,
                'content' => [
                    'errors' => $validate['errors']
                ]
            ], 404);
        }

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }

        $item = $this->getDoctrine()->getRepository(PaymentMethod::class)
            ->find($informations['payment_id']['value']);

        // ECHEC - La méthode de paiement n'existe pas
        if ($item == null) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::ENTITY_NOT_FOUND),
                'code' => ErrorCode::ENTITY_NOT_FOUND,
                'content' => []
            ], 404);
        }

        // Gestion de la commande
        $this->order_manager->setPaymentMethod([
            'payment_method' => $informations['payment_id']['value'],
            'payment_method_name' => $item->getReference()
        ]);

        $order = $this->order_manager->getOrder();

        // Définition du mode : pre-production (sandbox) / production (live) en fonction de l'adresse IP
        if (in_array($this->findCurrentIp($request), explode(',', $_ENV['TRUSTED_PROXIES']))) {
            $mode_debug = true;
        } else {
            $mode_debug = false;
        }

        // Définition de la méthode de paiement
        $this->paymentManager = new PaymentManager($this->getDoctrine(), $informations['payment_id']['value'], $mode_debug);

        // ECHEC - Configuration automatique du paiement en fonction de la commande
        if (!$this->paymentManager->autoConfigurePayment($order)) {
            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::SHOPPING_CONFIGURATION_PAYMENT_FAILED),
                'code' => ErrorCode::SHOPPING_CONFIGURATION_PAYMENT_FAILED,
                'content' => []
            ], 500);
        }

        // Récupération des variable de paiement
        $payment_vars = $this->paymentManager->getTemplate();

        // Définition du template d'activation du paiement
        $template = $this->renderView(
            '@app/shopping/payment/' . $payment_vars['template'] . '.html.twig',
            $payment_vars
        );

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => [
                'template' => $template
            ]
        ], 200);

    }

    /**
     * Sauvegarde de la commande
     *
     * @Route ("/ajax/order/save", name="order_save")
     */
    public function saveOrder(Request $request)
    {
        $this->initializeController($request);

        $em = $this->getDoctrine()->getManager();

        // Initialisation de la partie ECommerce si besoin
        if ($this->cart_manager == null) {
            $this->initializeShoppingController($request);
        }


        $order = $this->order_manager->getObjectOrder();

        $entity = $this->getDoctrine()->getRepository(Order::class)->findOneBy([
            'reference' => $order->getReference()
        ]);

        if ($entity != null) {
            $order = $entity;
        }

        $order->setCustomer($this->vars['account']['customer']);

        $cart = new Cart();
        foreach ($this->cart_manager->getCart()['products'] as $row) {
            $cart_product = new CartProduct();

            $product = $row['product'];
            $cart_product->setProduct($product);
            $cart_product->setReference($product->getReference());
            $cart_product->setDesignation($product->getDesignation());
            $cart_product->setPriceHt($product->getPriceHt());
            $cart_product->setRateTva(0);
            $cart_product->setWeight(0);


            $attributes = [];
            foreach ($row['attributes'] as $attribute) {
                $attributes[] = [
                    'group' => $attribute['group']->getId(),
                    'value' => $attribute['value']
                ];
            }
            $cart_product->setAttributes(json_encode($attributes));
            $cart_product->setQuantity($row['quantity']);

            $cart->addCartProduct($cart_product);
        }

        $order->setCart($cart);


        $entity = $this->getDoctrine()->getRepository(Order::class)->findOneBy([
            'reference' => $order->getReference()
        ]);

        $em->persist($order);

        if ($entity != null) {

            // Commande déjà payée
            if ($entity->getStatus() == OrderStatus::VALIDATED_PAYMENT) {
                return new JsonResponse([
                    'text' => ErrorCode::getTypeName(ErrorCode::SHOPPING_ORDER_ALREADY_VALIDATED),
                    'code' => ErrorCode::SHOPPING_ORDER_ALREADY_VALIDATED,
                    'content' => []
                ], 500);
            }

            // Commande déjà annulée
            if ($entity->getStatus() == OrderStatus::CANCELLED) {
                return new JsonResponse([
                    'text' => ErrorCode::getTypeName(ErrorCode::SHOPPING_ORDER_ALREADY_CANCELLED),
                    'code' => ErrorCode::SHOPPING_ORDER_ALREADY_CANCELLED,
                    'content' => []
                ], 500);
            }

            // Mise à jours de la commande si elle existait
            $em->persist($entity);
            $em->flush();

            return new JsonResponse([
                'text' => ErrorCode::getTypeName(ErrorCode::SHOPPING_ORDER_UPDATED),
                'code' => ErrorCode::SHOPPING_ORDER_UPDATED,
                'content' => []
            ], 200);
        }

        // Mise à jours de la commande si on la créer
        $em->flush();

        return new JsonResponse([
            'text' => ErrorCode::getTypeName(ErrorCode::FORM_SAVED),
            'code' => ErrorCode::FORM_SAVED,
            'content' => []
        ], 200);
    }

}
