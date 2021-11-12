<?php

namespace Shopping\Entity;

use Core\Entity\ControllerList;
use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Liste des moyens de livraison
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\DeliveryMethodRepository")
 * @ORM\Table(name="shopping_delivery_method")
 */
class DeliveryMethod extends ControllerList
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Liste des commandes ayant de moyen de livraison
     *
     * @ORM\OneToMany(targetEntity="Order", mappedBy="customer")
     */
    private $orders;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->__entityConstruct();

        $this->orders = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param Order $item
     */
    public function addOrder(Order $item)
    {
        $this->orders[] = $item;
        $item->setCustomer($this);
    }

    public function __toString()
    {
        return $this->getReference();
    }

}
