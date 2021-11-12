<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des types de civilité de client
 */
abstract class AddressTitleType extends Enum
{
    const MAN = 0;
    const WOMAN = 1;
    const MISS = 2;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::MAN => 'Monsieur',
        self::WOMAN => 'Madame',
        self::MISS => 'Mademoiselle',
    ];

}

/**
 * Enumération des types d'adresses (Livraison, Facturation, ...)
 */
abstract class AddressType extends Enum
{
    const DELIVERY = 0;
    const INVOICE = 1;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::DELIVERY => 'Livraison',
        self::INVOICE => 'Facturation'
    ];
}

/**
 * Adresse de client
 */
abstract class Address
{
    /**
     * Désignation de l'adresse (Maison, Travail, ...)
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $designation;

    /**
     * Civilité (Monsieur, Madame)
     *
     * @ORM\Column(type="integer")
     */
    protected $title;

    /**
     * Nom
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $lastname;

    /**
     * Prénom
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $firstname;

    /**
     * Ville
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $city;

    /**
     * Code postal
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $zip_code;

    /**
     * Adresse
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * Complément d'adresse (Porte, bâtiment, ...)
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $complement;

    /**
     * Pays
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $country;

    /**
     * Instructions de livraison
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $instruction;

    /**
     * @return mixed
     */
    public function getInstruction()
    {
        return $this->instruction;
    }

    /**
     * @param mixed $instruction
     */
    public function setInstruction($instruction)
    {
        $this->instruction = $instruction;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;

        $this->setTitle(AddressTitleType::MAN);
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * @param mixed $zip_code
     */
    public function setZipCode($zip_code): void
    {
        $this->zip_code = $zip_code;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @param mixed $complement
     */
    public function setComplement($complement): void
    {
        $this->complement = $complement;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

}
