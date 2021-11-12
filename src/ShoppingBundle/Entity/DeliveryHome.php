<?php

namespace Shopping\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Moyen de livraison - Livraison à domicile
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\DeliveryHomeRepository")
 * @ORM\Table(name="shopping_delivery_home")
 */
class DeliveryHome extends Delivery
{

    /**
     * @ORM\ManyToMany(targetEntity="DeliveryRule")
     */
    private $rules;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->rules = new ArrayCollection();

    }
    /**
     * @return ArrayCollection
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param DeliveryRule $item
     */
    public function addRule(DeliveryRule $item)
    {
        $this->rules[] = $item;
    }


}
