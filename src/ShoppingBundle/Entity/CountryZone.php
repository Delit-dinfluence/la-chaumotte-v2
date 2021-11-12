<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Zone géographiques (Europe, Asie, ...)
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\CountryZoneRepository")
 * @ORM\Table(name="shopping_country_zone")
 */
class CountryZone
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Désignation de la zone dans l'espace d'administration
     *
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * Pays composants la zone géographique
     *
     * @ORM\OneToMany(targetEntity="Country", mappedBy="country_zone")
     */
    private $countries;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->countries = new ArrayCollection();
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
     * @return ArrayCollection
     */
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * @param Country $item
     */
    public function addCountry(Country $item){
        $this->countries[] = $item;
        $item->setCountryZone($this);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getDesignation();
    }

}
