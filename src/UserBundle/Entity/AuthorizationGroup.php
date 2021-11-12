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
 * @ORM\Entity(repositoryClass="User\Repository\AuthorizationGroupRepository")
 * @ORM\Table(name="users_authorization_group")
 */
class AuthorizationGroup
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Authorization", inversedBy="group_authorizations")
     * @ORM\JoinColumn(name="authorization", referencedColumnName="id", nullable=true)
     */
    private $authorization;

    /**
     * @ORM\ManyToOne(targetEntity="UserGroup", inversedBy="group_authorizations")
     * @ORM\JoinColumn(name="team", referencedColumnName="id", nullable=true)
     */
    private $team;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enable_view;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enable_add;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enable_edit;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enable_delete;


    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->setEnableView(false);
        $this->setEnableAdd(false);
        $this->setEnableEdit(false);
        $this->setEnableDelete(false);
    }

    /**
     * @return mixed
     */
    public function getAuthorization()
    {
        return $this->authorization;
    }

    /**
     * @param mixed $authorization
     */
    public function setAuthorization($authorization): void
    {
        $this->authorization = $authorization;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     */
    public function setTeam($team): void
    {
        $this->team = $team;
    }

    /**
     * @return mixed
     */
    public function getEnableView()
    {
        return $this->enable_view;
    }

    /**
     * @param mixed $enable_view
     */
    public function setEnableView($enable_view): void
    {
        $this->enable_view = $enable_view;
    }

    /**
     * @return mixed
     */
    public function getEnableAdd()
    {
        return $this->enable_add;
    }

    /**
     * @param mixed $enable_add
     */
    public function setEnableAdd($enable_add): void
    {
        $this->enable_add = $enable_add;
    }

    /**
     * @return mixed
     */
    public function getEnableEdit()
    {
        return $this->enable_edit;
    }

    /**
     * @param mixed $enable_edit
     */
    public function setEnableEdit($enable_edit): void
    {
        $this->enable_edit = $enable_edit;
    }

    /**
     * @return mixed
     */
    public function getEnableDelete()
    {
        return $this->enable_delete;
    }

    /**
     * @param mixed $enable_delete
     */
    public function setEnableDelete($enable_delete): void
    {
        $this->enable_delete = $enable_delete;
    }

}
