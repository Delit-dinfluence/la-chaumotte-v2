<?php

namespace User\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Enumération des types de civilité de client
 */
abstract class AuthorizationType extends Enum
{
    const VIEW = 0;
    const EDIT = 1;
    const NEW = 2;
    const REMOVE = 3;
    const FORM = 4;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::VIEW => 'Aperçu',
        self::EDIT => 'Edition',
        self::NEW => 'Création',
        self::REMOVE => 'Suppression',
        self::FORM => 'Formulaire',
    ];

}

/**
 * @ORM\Entity(repositoryClass="User\Repository\AuthorizationRepository")
 * @ORM\Table(name="users_authorizations")
 */
class Authorization
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Produits du panier
     *
     * @ORM\OneToMany(targetEntity="AuthorizationGroup", mappedBy="authorization",cascade={"persist"})
     */
    private $group_authorizations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dev_key;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="users")
     */
    private $users;

    /**
     * Parent de la catégorie
     *
     * @ORM\ManyToOne(targetEntity="Authorization", inversedBy="children")
     * @ORM\JoinColumn(name="parent", referencedColumnName="id", nullable=true)
     */
    private $parent;

    /**
     * Sous-catégories de la catégorie
     *
     * @ORM\OneToMany(targetEntity="Authorization", mappedBy="parent")
     */
    private $children;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->children = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->group_authorizations = new ArrayCollection();

    }
    public function getGroupAuthorization()
    {
        return $this->group_authorizations;
    }

    /**
     * @param AuthorizationGroup $item
     */
    public function addGroupAuthorization(AuthorizationGroup $item)
    {
        if ($this->group_authorizations->contains($item)) {
            return;
        }
        $this->group_authorizations->add($item);
        $item->addAuthorization($this);
    }

    /**
     * @param AuthorizationGroup $item
     */
    public function removeGroupAuthorization(AuthorizationGroup $item)
    {
        if (!$this->group_authorizations->contains($item)) {
            return;
        }
        $this->group_authorizations->removeElement($item);
        $item->removeAuthorization($this);
    }


    /**
     * @return mixed
     */
    public function getDevKey()
    {
        return $this->dev_key;
    }

    /**
     * @param mixed $dev_key
     */
    public function setDevKey($dev_key)
    {
        $this->dev_key = $dev_key;
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
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Authorization $parent
     */
    public function setParent(Authorization $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Authorization $child
     */
    public function addChild(Authorization $child)
    {
        $this->children[] = $child;
        $child->setParent($this);
    }

    /**
     * @param User $item
     */
    public function addUser(User $item)
    {
        $this->users[] = $item;
        $item->addAuthorization($this);
    }

    public function __toString()
    {
        return (String)$this->getDesignation();
    }
}
