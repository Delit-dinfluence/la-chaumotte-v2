<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

abstract class ControllerList
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }
    /**
     * Référence
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $reference;

    /**
     * Controller à utiliser
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $controller;

    /**
     * Entité à utiliser
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $controller_entity;


    /**
     * Module de l'entité à utiliser
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $controller_module;


    /**
     * Action à utiliser pour cette entité
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $controller_action;

    /**
     * Identifiant à utiliser pour cette entité si "action == form"
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $controller_id;

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
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }


    /**
     * @return mixed
     */
    public function getControllerEntity()
    {
        return $this->controller_entity;
    }

    /**
     * @param mixed $controller_entity
     */
    public function setControllerEntity($controller_entity): void
    {
        $this->controller_entity = $controller_entity;
    }

    /**
     * @return mixed
     */
    public function getControllerModule()
    {
        return $this->controller_module;
    }

    /**
     * @param mixed $controller_module
     */
    public function setControllerModule($controller_module): void
    {
        $this->controller_module = $controller_module;
    }

    /**
     * @return mixed
     */
    public function getControllerAction()
    {
        return $this->controller_action;
    }

    /**
     * @param mixed $controller_action
     */
    public function setControllerAction($controller_action): void
    {
        $this->controller_action = $controller_action;
    }

    /**
     * @return mixed
     */
    public function getControllerId()
    {
        return $this->controller_id;
    }

    /**
     * @param mixed $controller_id
     */
    public function setControllerId($controller_id): void
    {
        $this->controller_id = $controller_id;
    }

}
