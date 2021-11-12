<?php

namespace User\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="User\Repository\UserRepository")
 * @ORM\Table(name="users_user")
 */
class User implements UserInterface, \Serializable
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }
    /**
     * @ORM\ManyToMany(targetEntity="Authorization", inversedBy="authorizations")
     */
    private $authorizations;

    /**
     *
     * @ORM\ManyToMany(targetEntity="UserGroup", mappedBy="users")
     */
    private $userGroups;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=250)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $forgot_token;

    /**
     * Date de création
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $forgot_time;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

    /**
     * Panier
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Customer", inversedBy="user",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="customer", referencedColumnName="id", nullable=true)
     */
    private $customer;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();
        $this->isActive = true;
        // $this->salt = md5(uniqid('', true));
        $this->userGroups = new ArrayCollection();
        $this->authorizations = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getForgotToken()
    {
        return $this->forgot_token;
    }

    /**
     * @param mixed $forgot_token
     */
    public function setForgotToken($forgot_token): void
    {
        $this->forgot_token = $forgot_token;
    }

    /**
     * @return mixed
     */
    public function getForgotTime()
    {
        return $this->forgot_time;
    }

    /**
     * @param mixed $forgot_time
     */
    public function setForgotTime($forgot_time): void
    {
        $this->forgot_time = $forgot_time;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer): void
    {
        $this->customer = $customer;
    }


    public function getUserGroups()
    {
        return $this->userGroups;
    }

    /**
     * @param UserGroup $userGroup
     */
    public function addUserGroup(UserGroup $userGroup)
    {
        if ($this->userGroups->contains($userGroup)) {
            return;
        }

        $this->userGroups->add($userGroup);
    }

    /**
     * @param UserGroup $userGroup
     */
    public function removeUserGroup(UserGroup $userGroup)
    {
        if (!$this->userGroups->contains($userGroup)) {
            return;
        }

        $this->userGroups->removeElement($userGroup);
    }

    public function getIdentity()
    {
        return trim((String)$this->getFirstname() . ' ' . $this->getLastname());
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


    public function getUsername()
    {
        return $this->email;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRoles()
    {
        if (empty($this->roles)) {
            return ['ROLE_USER'];
        }
        return $this->roles;
    }

    function addRole($role)
    {
        $this->roles[] = $role;
    }

    public function eraseCredentials()
    {

    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return json_encode([
            'id' => $this->id,
            'email' => $this->email,
            'password' => $this->password,
            'isActive' => $this->isActive
        ]);

    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {

        $params = json_decode($serialized);

        $this->id = $params->id;
        $this->email = $params->email;
        $this->password = $params->password;
        $this->isActive = $params->isActive;


        return $this;

    }

    function getId()
    {
        return $this->id;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPlainPassword()
    {
        return $this->plainPassword;
    }

    function getIsActive()
    {
        return $this->isActive;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return ArrayCollection
     */
    public function getAuthorizations()
    {
        return $this->authorizations;
    }

    /**
     * @param Authorization $item
     */
    public function addAuthorization(Authorization $item)
    {
        $this->authorizations[] = $item;
        $item->addTeam($this);
    }

    public function __toString()
    {
        return $this->getIdentity();
    }
}
