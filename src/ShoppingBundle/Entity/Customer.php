<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\CustomerRepository")
 * @ORM\Table(name="shopping_customer")
 */
class Customer
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Civilité (Monsieur, Madame, ...)
     *
     * @ORM\Column(type="integer")
     */
    private $title;

    /**
     * Date d'anniversaire
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birthday;

    /**
     * Téléphone
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * Inscription à la newsletter
     *
     * @ORM\Column(type="boolean")
     */
    private $use_newsletter;

    /**
     * Liste des adresses
     *
     * @ORM\OneToMany(targetEntity="CustomerAddress", mappedBy="customer")
     */
    private $address;

    /**
     * Liste des commandes
     *
     * @ORM\OneToMany(targetEntity="Order", mappedBy="customer")
     */
    private $orders;

    /**
     * Dernière visite
     *
     * @ORM\Column(type="datetime")
     */
    private $last_visit;

    /**
     * Utilisateur
     *
     * @ORM\OneToOne(targetEntity="User\Entity\User", mappedBy="customer")
     */
    private $user;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->address = new ArrayCollection();
        $this->orders = new ArrayCollection();

        $datetime = new \Datetime();
        $this->setLastVisit($datetime);
        $this->setUseNewsletter(false);
    }

    /**
     * @return mixed
     */
    public function getUseNewsletter()
    {
        return $this->use_newsletter;
    }

    /**
     * @param mixed $use_newsletter
     */
    public function setUseNewsletter($use_newsletter): void
    {
        $this->use_newsletter = $use_newsletter;
    }

    /**
     * Retourne la date de naissance
     *
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Définis la date de naissance
     *
     * @param mixed $birthday
     */
    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * Retourne le téléphone
     *
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Définis le téléphone
     *
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Retourne l'utilisateur
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Définis l'utilisateur
     *
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }


    /**
     * Retourne la civilité
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Définis la civilité
     *
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * Retourne la dernière visite
     *
     * @return mixed
     */
    public function getLastVisit()
    {
        return $this->last_visit;
    }

    /**
     * Définis la dernière visite
     *
     * @param mixed $last_visit
     */
    public function setLastVisit($last_visit): void
    {
        $this->last_visit = $last_visit;
    }

    /**
     * Retourne les adresses
     *
     * @return ArrayCollection
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Ajoute une adresse
     *
     * @param CustomerAddress $item
     */
    public function addAddress(CustomerAddress $item)
    {
        $this->address[] = $item;
        $item->setCustomer($this);
    }

    /**
     * Retourne les commandes
     *
     * @return ArrayCollection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Ajoute une commande
     *
     * @param Order $item
     */
    public function addOrder(Order $item)
    {
        $this->orders[] = $item;
    }

}
