<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Enumération des types de traduction
 */
abstract class RedirectionType extends Enum
{
    const NO_REDIRECTION = 0;
    const TEMPORARY_REDIRECT = 1;
    const PERMANENT_REDIRECT = 2;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::NO_REDIRECTION => 'Aucune redirection (404)',
        self::PERMANENT_REDIRECT => 'Permanente (301)',
        self::TEMPORARY_REDIRECT => 'Temporaire (302)',
    ];

}


/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Core\Repository\RedirectionRepository")
 * @ORM\Table(name="core_redirection")
 */
class Redirection
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $type;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uri_from;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uri_to;

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
    public function getUriFrom()
    {
        return $this->uri_from;
    }

    /**
     * @param mixed $uri_from
     */
    public function setUriFrom($uri_from)
    {
        $this->uri_from = $uri_from;
    }

    /**
     * @return mixed
     */
    public function getUriTo()
    {
        return $this->uri_to;
    }

    /**
     * @param mixed $uri_to
     */
    public function setUriTo($uri_to)
    {
        $this->uri_to = $uri_to;
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
    public function setType($type)
    {
        $this->type = $type;
    }


}
