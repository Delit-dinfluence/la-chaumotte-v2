<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des status de commande
 */
abstract class OrderStatus extends Enum
{
    const PENDING_PAYMENT = 0;
    const VALIDATED_PAYMENT = 1;
    const PREPARATION_IN_PROGRESS = 2;
    const SHIPPED = 3;
    const CANCELLED = 4;
    const ERROR_PAYMENT = 5;
    const REFUNDED = 6;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::PENDING_PAYMENT => 'En attente de paiement',
        self::VALIDATED_PAYMENT => 'Paiement validé',
        self::PREPARATION_IN_PROGRESS => 'En préparation',
        self::SHIPPED => 'Expediée',
        self::CANCELLED => 'Annulée',
        self::ERROR_PAYMENT => 'Erreur de paiement',
        self::REFUNDED => 'Remboursée',
    ];

}

/**
 * Commande
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\OrderRepository")
 * @ORM\Table(name="shopping_order")
 */
class Order
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Commande de test
     *
     * @ORM\Column(type="boolean")
     */
    private $debug;

    /**
     * Référence unique de la commande
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $reference;

    /**
     * Status de la commande
     *
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * Mode de livraison
     *
     * @ORM\ManyToOne(targetEntity="PaymentMethod", inversedBy="order")
     * @ORM\JoinColumn(name="payment_method", referencedColumnName="id", nullable=true)
     */
    private $payment_method;

    /**
     * Sauvegarde du nom du mode de paiement actuellement utilisé
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $payment_method_name;

    /**
     * Mode de livraison
     *
     * @ORM\ManyToOne(targetEntity="DeliveryMethod", inversedBy="order")
     * @ORM\JoinColumn(name="delivery_method", referencedColumnName="id", nullable=true)
     */
    private $delivery_method;

    /**
     * Sauvegarde du nom du mode de livraison actuellement utilisé
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $delivery_method_name;

    /**
     * Type de livraison (Domicile, Points relais, ...)
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $delivery_type;

    /**
     * Prix actuel de la livraison à appliquer
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $delivery_price;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $sub_total_ht;


    /**
     * Adresses de la commandes (Livraison, Facturation, ...)
     *
     * @ORM\OneToMany(targetEntity="OrderAddress", mappedBy="order", cascade={"persist", "remove"})
     */
    private $address;

    /**
     * Actions sur la commande (Changement de status, ...)
     *
     * @ORM\OneToMany(targetEntity="OrderAction", mappedBy="order", cascade={"persist", "remove"})
     */
    private $actions;

    /**
     * Client
     *
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="order", cascade={"persist"})
     * @ORM\JoinColumn(name="customer", referencedColumnName="id", nullable=true)
     */
    private $customer;

    /**
     * Panier
     *
     * @ORM\ManyToOne(targetEntity="Cart", inversedBy="order",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="cart", referencedColumnName="id", nullable=true)
     */
    private $cart;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->address = new ArrayCollection();
        $this->actions = new ArrayCollection();

        $this->setReference(uniqid());
        $this->setStatus(OrderStatus::PENDING_PAYMENT);

        $this->setDebug(false);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }


    /**
     * @return mixed
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * @param mixed $debug
     */
    public function setDebug($debug): void
    {
        $this->debug = $debug;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }



    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * @param mixed $payment_method
     */
    public function setPaymentMethod($payment_method): void
    {
        $this->payment_method = $payment_method;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethodName()
    {
        return $this->payment_method_name;
    }

    /**
     * @param mixed $payment_method_name
     */
    public function setPaymentMethodName($payment_method_name): void
    {
        $this->payment_method_name = $payment_method_name;
    }

    /**
     * @return mixed
     */
    public function getDeliveryMethod()
    {
        return $this->delivery_method;
    }

    /**
     * @param mixed $delivery_method
     */
    public function setDeliveryMethod($delivery_method): void
    {
        $this->delivery_method = $delivery_method;
    }

    /**
     * @return mixed
     */
    public function getDeliveryMethodName()
    {
        return $this->delivery_method_name;
    }

    /**
     * @param mixed $delivery_method_name
     */
    public function setDeliveryMethodName($delivery_method_name): void
    {
        $this->delivery_method_name = $delivery_method_name;
    }

    /**
     * @return mixed
     */
    public function getDeliveryPrice()
    {
        return $this->delivery_price;
    }

    /**
     * @param mixed $delivery_price
     */
    public function setDeliveryPrice($delivery_price): void
    {
        $this->delivery_price = $delivery_price;
    }

    /**
     * @return mixed
     */
    public function getDeliveryType()
    {
        return $this->delivery_type;
    }

    /**
     * @param mixed $delivery_type
     */
    public function setDeliveryType($delivery_type): void
    {
        $this->delivery_type = $delivery_type;
    }

    /**
     * Retourne les adresses
     *
     * @return ArrayCollection
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Ajoute une adresse
     *
     * @param OrderAddress $item
     */
    public function addAddress(OrderAddress $item)
    {
        foreach ($this->address as $address) {
            if ($address->getAddressType() == $item->getAddressType()) {
                $this->address->removeElement($address);
            }
        }

        $this->address[] = $item;
        $item->setOrder($this);
    }

    public function getAddressByType($type)
    {
        foreach ($this->address as $address) {
            if ($address->getAddressType() == $type) {
                return $address;
            }
        }
        return false;
    }

    /**
     * Retourne les actions
     *
     * @return ArrayCollection
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Ajoute une action
     *
     * @param OrderAction $item
     */
    public function addActions(OrderAction $item)
    {
        $this->actions[] = $item;
        $item->setOrder($this);
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer): void
    {
        $this->customer = $customer;
        $customer->addOrder($this);
    }


    /**
     * @return mixed
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param mixed $cart
     */
    public function setCart($cart): void
    {
        $this->cart = $cart;
    }

    /**
     * @return mixed
     */
    public function getSubTotalHt()
    {
        return $this->sub_total_ht;
    }

    /**
     * @param mixed $sub_total_ht
     */
    public function setSubTotalHt($sub_total_ht): void
    {
        $this->sub_total_ht = $sub_total_ht;
    }

    public function getTotalTTC()
    {
        return number_format((float)$this->getSubTotalHt() + $this->getDeliveryPrice() + $this->getTax(), 2, '.', '');
    }

    public function getTax()
    {
        return 0;
    }


    /**
     * Retourne le coût de livraison
     */
    public function getShippingPrice()
    {
        // TODO Raccordé les shiping price
        $shipping_price = 0;

        return $shipping_price;
    }


    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getReference();
    }

}
