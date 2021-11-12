<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des types de remises
 */
abstract class ReductionType extends Enum
{
    const PERCENTAGE = 0;
    const FIXE = 1;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::PERCENTAGE => 'Pourcentage',
        self::FIXE => 'Prix fixe HT',
    ];

}

/**
 * Réduction sur un produit/catégorie
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\ReductionRepository")
 * @ORM\Table(name="shopping_reduction")
 */
class Reduction
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Valeur de la réduction
     *
     * @ORM\Column(type="float")
     */
    protected $value;

    /**
     * Type de réduction (Pourcentage, Prix fixe, ...)
     *
     * @ORM\Column(type="integer")
     */
    protected $type;

    /**
     * Utiliser une période pour utiliser la remise ?
     *
     * @ORM\Column(type="boolean")
     */
    protected $use_timer;

    /**
     * Date de début de la remise
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $available_from;

    /**
     * Date de fin de la remise
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $available_to;

    /**
     * Nombre minimum de produit à commander pour bénéficier de la remise
     *
     * @ORM\Column(type="integer")
     */
    protected $starting_at;

    /**
     * Groupes bénéficiants de la remise
     *
     * @ORM\ManyToMany(targetEntity="CustomerGroup", mappedBy="reductions")
     */
    protected $groups;

    /**
     * Clients bénéficiants de la remise
     *
     * @ORM\ManyToMany(targetEntity="Customer", mappedBy="reductions")
     */
    protected $customers;

    /**
     * Constructor
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->groups = new ArrayCollection();
        $this->customers = new ArrayCollection();

        $this->setType(ReductionType::FIXE);
        $this->setUseTimer(false);
        $this->setStartingAt(1);
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getUseTimer()
    {
        return $this->use_timer;
    }

    /**
     * @param mixed $use_timer
     */
    public function setUseTimer($use_timer): void
    {
        $this->use_timer = $use_timer;
    }

    /**
     * @return mixed
     */
    public function getAvailableFrom()
    {
        return $this->available_from;
    }

    /**
     * @param mixed $available_from
     */
    public function setAvailableFrom($available_from): void
    {
        $this->available_from = $available_from;
    }

    /**
     * @return mixed
     */
    public function getAvailableTo()
    {
        return $this->available_to;
    }

    /**
     * @param mixed $available_to
     */
    public function setAvailableTo($available_to): void
    {
        $this->available_to = $available_to;
    }

    /**
     * @return mixed
     */
    public function getStartingAt()
    {
        return $this->starting_at;
    }

    /**
     * @param mixed $starting_at
     */
    public function setStartingAt($starting_at): void
    {
        $this->starting_at = $starting_at;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param Reduction $item
     */
    public function addGroup(Reduction $item)
    {
        $this->groups[] = $item;
    }

    /**
     * @return mixed
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param Reduction $item
     */
    public function addCustomer(Reduction $item)
    {
        $this->customers[] = $item;
    }

}

