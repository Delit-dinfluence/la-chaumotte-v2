<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Taxe
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\TaxRepository")
 * @ORM\Table(name="shopping_tax")
 */
class Tax
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Désignation
     *
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * Taux
     *
     * @ORM\Column(type="string", length=255)
     */
    private $rate;

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
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate): void
    {
        $this->rate = $rate;
    }

    public function __toString()
    {
        return $this->getDesignation();
    }

}
