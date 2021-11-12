<?php

namespace Sender\Entity;

use Core\Entity\ControllerList;
use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des status
 */
abstract class NewsletterStatus extends Enum
{
    const AWAITING_VALIDATION = 0;
    const SUBSCRIBE = 1;
    const UNSUSCRIBE = 2;

    protected static $typeName = [
        self::AWAITING_VALIDATION => 'En attente de validation',
        self::SUBSCRIBE => 'Inscrit',
        self::UNSUSCRIBE => 'Désinscrit',
    ];
}

/**
 * Enumération des status
 */
abstract class NewsletterType extends Enum
{
    const EMAIL = 0;
    const SMS = 1;

    protected static $typeName = [
        self::EMAIL => 'Email',
        self::SMS => 'SMS',
    ];
}

/**
 * @ORM\Entity(repositoryClass="Sender\Repository\NewsletterRepository")
 * @ORM\Table(name="sender_newsletter")
 */
class Newsletter extends ControllerList
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->__entityConstruct();

        $this->setType(NewsletterType::EMAIL);
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

    public function __toString()
    {
        return (string)$this->getReference();
    }

}
