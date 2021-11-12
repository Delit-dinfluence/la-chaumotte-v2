<?php

namespace User\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Persistence\ObjectManagerAware;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="User\Repository\UserGroupRepository")
 * @ORM\Table(name="users_user_group")
 */
class UserGroup
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Produits du panier
     *
     * @ORM\OneToMany(targetEntity="AuthorizationGroup", mappedBy="authorization")
     */
    private $group_authorizations;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="userGroups", cascade={"persist"})
     * @ORM\JoinTable(
     *  name="users_user_user_group",
     *  joinColumns={
     *      @ORM\JoinColumn(name="usergroup_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *  }
     * )
     */
    private $users;

    /**
     * Ordre de priorité
     *
     * @ORM\Column(type="integer")
     */
    private $priority;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->users = new ArrayCollection();
        $this->group_authorizations = new ArrayCollection();


        $this->setPriority(0);
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


    public function getUsers(){
        return $this->users;
    }


    /**
     * @param User $user
     */
    public function addUser(User $user)
    {
        if ($this->users->contains($user)) {
            return;
        }
        $this->users->add($user);
        $user->addUserGroup($this);
    }
    /**
     * @param User $user
     */
    public function removeUser(User $user)
    {
        if (!$this->users->contains($user)) {
            return;
        }
        $this->users->removeElement($user);
        $user->removeUserGroup($this);
    }
    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority): void
    {
        $this->priority = $priority;
    }

    public function __toString()
    {
        return $this->getDesignation();
    }

}
