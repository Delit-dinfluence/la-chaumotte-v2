<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\CountryRepository")
 * @ORM\Table(name="shopping_country")
 */
class Country
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Code ISO du pays
     *
     * @ORM\Column(type="string", length=255)
     */
    private $code_iso;

    /**
     * Préfix de téléphone
     *
     * @ORM\Column(type="string", length=255)
     */
    private $call_prefix;

    /**
     * Format des codes postaux
     *
     * @ORM\Column(type="string", length=255)
     */
    private $zip_code_format;

    /**
     * Le pays contient des états ?
     *
     * @ORM\Column(type="boolean")
     */
    private $contains_states;

    /**
     * Zone géographique du pays
     *
     * @ORM\ManyToOne(targetEntity="CountryZone", inversedBy="countries")
     * @ORM\JoinColumn(name="country_zone", referencedColumnName="id", nullable=true)
     */
    private $country_zone;

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
    public function getCodeIso()
    {
        return $this->code_iso;
    }

    /**
     * @param mixed $code_iso
     */
    public function setCodeIso($code_iso): void
    {
        $this->code_iso = $code_iso;
    }

    /**
     * @return mixed
     */
    public function getCallPrefix()
    {
        return $this->call_prefix;
    }

    /**
     * @param mixed $call_prefix
     */
    public function setCallPrefix($call_prefix): void
    {
        $this->call_prefix = $call_prefix;
    }

    /**
     * @return mixed
     */
    public function getZipCodeFormat()
    {
        return $this->zip_code_format;
    }

    /**
     * @param mixed $zip_code_format
     */
    public function setZipCodeFormat($zip_code_format): void
    {
        $this->zip_code_format = $zip_code_format;
    }

    /**
     * @return mixed
     */
    public function getCountryZone()
    {
        return $this->country_zone;
    }

    /**
     * @param mixed $country_zone
     */
    public function setCountryZone($country_zone): void
    {
        $this->country_zone = $country_zone;
    }

    /**
     * @return mixed
     */
    public function getContainsStates()
    {
        return $this->contains_states;
    }

    /**
     * @param mixed $contains_states
     */
    public function setContainsStates($contains_states): void
    {
        $this->contains_states = $contains_states;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getDesignation();
    }

}
