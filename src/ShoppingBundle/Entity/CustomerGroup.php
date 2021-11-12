<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe du client (Visiteur, Groupe A, VIP, ...)
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\CustomerGroupRepository")
 * @ORM\Table(name="shopping_customer_group")
 */
class CustomerGroup
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Clients appartenants au groupe
     *
     * @ORM\ManyToMany(targetEntity="Customer", mappedBy="groups")
     */
    private $customers;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->customers = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param Customer $item
     */
    public function addCustomer(Customer $item)
    {
        $this->customers[] = $item;
    }

}
