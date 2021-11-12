<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="Shopping\Repository\OrderAddressRepository")
 * @ORM\Table(name="shopping_order_address")
 */
class OrderAddress extends Address
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Type d'adresse (Livraison, Facturation, ...)
     *
     * @ORM\Column(type="integer")
     */
    private $address_type;

    /**
     * Commande à laquelle est rattachée cette adresse
     *
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="address")
     * @ORM\JoinColumn(name="order_object", referencedColumnName="id", nullable=true)
     */
    private $order;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();
    }

    /**
     * @return mixed
     */
    public function getAddressType()
    {
        return $this->address_type;
    }

    /**
     * @param mixed $address_type
     */
    public function setAddressType($address_type): void
    {
        $this->address_type = $address_type;
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

}
