<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;


/**
 * Action sur une commande (Changement de statut, de moyen de livraison, ...)
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\OrderActionRepository")
 * @ORM\Table(name="shopping_order_action")
 */
class OrderAction
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Libellé de l'action
     *
     * @ORM\Column(type="string")
     */
    private $reference;

    /**
     * Libellé de l'action
     *
     * @ORM\Column(type="string")
     */
    private $libelle;

    /**
     * Libellé de l'action
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * Commande à laquelle est rattachée cette adresse
     *
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="actions")
     * @ORM\JoinColumn(name="order_object", referencedColumnName="id", nullable=true)
     */
    private $order;


    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->setReference(uniqid());
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle): void
    {
        $this->libelle = $libelle;
    }


    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order): void
    {
        $this->order = $order;
    }

}
