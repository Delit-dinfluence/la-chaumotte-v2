<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Adresses d'un client
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\CustomerAddressRepository")
 * @ORM\Table(name="shopping_customer_address")
 */
class CustomerAddress extends  Address
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Client
     *
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="address")
     * @ORM\JoinColumn(name="customer", referencedColumnName="id", nullable=true)
     */
    private $customer;


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
    }

}
