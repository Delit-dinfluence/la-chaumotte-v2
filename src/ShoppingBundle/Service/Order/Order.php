<?php

namespace Shopping\Service\Order;

use Shopping\Entity\AddressType;
use Shopping\Entity\OrderAddress;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Shopping\Entity\Order as EntityOrder;

/**
 * Commande
 */
class Order
{
    /**
     * Commande
     */
    private $order;

    /**
     * Adresse de facturation
     */
    private $address_invoice;

    /**
     * Adresse de livraison
     */
    private $address_delivery;


    public function setEmail($email)
    {
        $this->order->setEmail($email);
    }

    public function setSubTotalHt($sub_total_ht): void
    {
        $this->order->setSubTotalHt($sub_total_ht);
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order): void
    {
        $this->order = $order;
    }


    public function setInvoiceAddress($params)
    {
        $invoice = new OrderAddress();
        $invoice->setAddressType(AddressType::INVOICE);

        $invoice->setTitle($params['address_invoice_title']);
        $invoice->setFirstname($params['address_invoice_lastname']);
        $invoice->setLastname($params['address_invoice_firstname']);
        $invoice->setCity($params['address_invoice_city']);
        $invoice->setZipCode($params['address_invoice_zip_code']);
        $invoice->setAddress($params['address_invoice_address']);
        $invoice->setComplement($params['address_invoice_complement']);
        $invoice->setCountry($params['address_invoice_country']);
        $this->order->setUseSameAddress($params['use_same_address']);

        $this->address_invoice = $invoice;
        $this->order->addAddress($this->address_invoice);
    }

    public function setDeliveryAddress($params)
    {
        $delivery = new OrderAddress();
        $delivery->setAddressType(AddressType::DELIVERY);

        $delivery->setTitle($params['address_delivery_title']);
        $delivery->setFirstname($params['address_delivery_lastname']);
        $delivery->setLastname($params['address_delivery_firstname']);
        $delivery->setCity($params['address_delivery_city']);
        $delivery->setZipCode($params['address_delivery_zip_code']);
        $delivery->setAddress($params['address_delivery_address']);
        $delivery->setComplement($params['address_delivery_complement']);
        $delivery->setCountry($params['address_delivery_country']);


        $this->address_delivery = $delivery;
        $this->order->addAddress($this->address_delivery);
    }





    public function setAddressDelivery($params)
    {
        $delivery = new OrderAddress();
        $delivery->setAddressType(AddressType::DELIVERY);

        $delivery->setTitle($params['address']->getTitle());
        $delivery->setFirstname($params['address']->getFirstname());
        $delivery->setLastname($params['address']->getLastname());
        $delivery->setCity($params['address']->getCity());
        $delivery->setZipCode($params['address']->getZipCode());
        $delivery->setAddress($params['address']->getAddress());
        $delivery->setComplement($params['address']->getComplement());
        $delivery->setCountry($params['address']->getCountry());

        $this->address_delivery = $delivery;
        $this->order->addAddress($this->address_delivery);
    }

    public function setAddressInvoice($params)
    {
        $delivery = new OrderAddress();
        $delivery->setAddressType(AddressType::INVOICE);

        $delivery->setTitle($params['address']->getTitle());
        $delivery->setFirstname($params['address']->getFirstname());
        $delivery->setLastname($params['address']->getLastname());
        $delivery->setCity($params['address']->getCity());
        $delivery->setZipCode($params['address']->getZipCode());
        $delivery->setAddress($params['address']->getAddress());
        $delivery->setComplement($params['address']->getComplement());
        $delivery->setCountry($params['address']->getCountry());

        $this->address_delivery = $delivery;
        $this->order->addAddress($this->address_delivery);
    }

    /**
     * Mise à jours du moyen de livraison
     */
    public function setDeliveryMethod($params)
    {
        $this->order->setDeliveryMethod($params['delivery_method']);
        $this->order->setDeliveryMethodName($params['delivery_method_name']);
    }

    /**
     * Mise à jours du moyen de paiement
     */
    public function setPaymentMethod($params)
    {
        $this->order->setPaymentMethod($params['payment_method']);
        $this->order->setPaymentMethodName($params['payment_method_name']);
    }

    public function serialize()
    {
        $array = [
            'reference' => $this->order->getReference(),
            'status' => $this->order->getStatus(),
            'payment_method' => $this->order->getPaymentMethod(),
            'payment_method_name' => $this->order->getPaymentMethodName(),
            'delivery_method' => $this->order->getDeliveryMethod(),
            'delivery_method_name' => $this->order->getDeliveryMethodName(),
            'delivery_price' => $this->order->getDeliveryPrice(),
            'sub_total_ht' => $this->order->getSubTotalHt(),
            'amount_total_ttc' => $this->order->getTotalTTC(),
            'email' => $this->order->getEmail()
        ];

        // Adresse de la commande - Livraison
        if (($address = $this->order->getAddressByType(AddressType::DELIVERY)) != false) {
            $array = array_merge($array, [
                'address_delivery_title' => $address->getTitle(),
                'address_delivery_firstname' => $address->getFirstname(),
                'address_delivery_lastname' => $address->getLastname(),
                'address_delivery_city' => $address->getCity(),
                'address_delivery_zip_code' => $address->getZipCode(),
                'address_delivery_address' => $address->getAddress(),
                'address_delivery_complement' => $address->getComplement(),
                'address_delivery_country' => $address->getCountry(),
            ]);
        }

        // Adresse de la commande - Facturation
        if (($address = $this->order->getAddressByType(AddressType::INVOICE)) != false) {
            $array = array_merge($array, [
                'address_invoice_title' => $address->getTitle(),
                'address_invoice_firstname' => $address->getFirstname(),
                'address_invoice_lastname' => $address->getLastname(),
                'address_invoice_city' => $address->getCity(),
                'address_invoice_zip_code' => $address->getZipCode(),
                'address_invoice_address' => $address->getAddress(),
                'address_invoice_complement' => $address->getComplement(),
                'address_invoice_country' => $address->getCountry(),
            ]);
        }

        return $array;
    }

    public static function unserialize($params)
    {
        // Commande
        $order = new EntityOrder();

        if ($params != null) {

            // Commande
            if (array_key_exists('email', $params)) $order->setEmail($params->email);
            if (array_key_exists('reference', $params)) $order->setReference($params->reference);
            if (array_key_exists('status', $params)) $order->setStatus($params->status);
            if (array_key_exists('payment_method', $params)) $order->setPaymentMethod($params->payment_method);
            if (array_key_exists('payment_method_name', $params)) $order->setPaymentMethodName($params->payment_method_name);
            if (array_key_exists('delivery_method', $params)) $order->setDeliveryMethod($params->delivery_method);
            if (array_key_exists('delivery_method_name', $params)) $order->setDeliveryMethodName($params->delivery_method_name);
            if (array_key_exists('delivery_price', $params)) $order->setDeliveryPrice($params->delivery_price);
            if (array_key_exists('sub_total_ht', $params)) $order->setSubTotalHt($params->sub_total_ht);

            // Addresse de la commande - Livraison
            $delivery = new OrderAddress();
            $delivery->setAddressType(AddressType::DELIVERY);
            $order->addAddress($delivery);
            if (array_key_exists('address_delivery_title', $params)) $delivery->setTitle($params->address_delivery_title);
            if (array_key_exists('address_delivery_firstname', $params)) $delivery->setFirstname($params->address_delivery_firstname);
            if (array_key_exists('address_delivery_lastname', $params)) $delivery->setLastname($params->address_delivery_lastname);
            if (array_key_exists('address_delivery_city', $params)) $delivery->setCity($params->address_delivery_city);
            if (array_key_exists('address_delivery_zip_code', $params)) $delivery->setZipCode($params->address_delivery_zip_code);
            if (array_key_exists('address_delivery_address', $params)) $delivery->setAddress($params->address_delivery_address);
            if (array_key_exists('address_delivery_complement', $params)) $delivery->setComplement($params->address_delivery_complement);
            if (array_key_exists('address_delivery_country', $params)) $delivery->setCountry($params->address_delivery_country);
            $order->addAddress($delivery);

            // Adresse de la commande - Facturation
            $invoice = new OrderAddress();
            $invoice->setAddressType(AddressType::INVOICE);
            $order->addAddress($invoice);
            if (array_key_exists('address_invoice_title', $params)) $invoice->setTitle($params->address_invoice_title);
            if (array_key_exists('address_invoice_firstname', $params)) $invoice->setFirstname($params->address_invoice_firstname);
            if (array_key_exists('address_invoice_lastname', $params)) $invoice->setLastname($params->address_invoice_lastname);
            if (array_key_exists('address_invoice_city', $params)) $invoice->setCity($params->address_invoice_city);
            if (array_key_exists('address_invoice_zip_code', $params)) $invoice->setZipCode($params->address_invoice_zip_code);
            if (array_key_exists('address_invoice_address', $params)) $invoice->setAddress($params->address_invoice_address);
            if (array_key_exists('address_invoice_complement', $params)) $invoice->setComplement($params->address_invoice_complement);
            if (array_key_exists('address_invoice_country', $params)) $invoice->setCountry($params->address_invoice_country);
            $order->addAddress($invoice);

        }

        $entity = new Order();
        $entity->setOrder($order);

        return $entity;
    }

}