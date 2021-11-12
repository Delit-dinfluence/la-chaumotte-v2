<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Historique des actions sur l'application
 *
 * @ORM\Entity(repositoryClass="Core\Repository\HistoryRepository")
 * @ORM\Table(name="core_history")
 */
class History
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Type de gravité (Information, Erreur mineur, Erreur critique, ...)
     *
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * Message
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * Code d'erreur
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $code;

    /**
     * Utilisateur ayant effectué l'action
     *
     * @ORM\ManyToOne(targetEntity="User\Entity\User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $user;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

}
