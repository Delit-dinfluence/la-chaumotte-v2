<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration de la page de "Coming Soon" de l'application
 *
 * @ORM\Entity(repositoryClass="Core\Repository\ComingSoonConfigurationRepository")
 * @ORM\Table(name="core_coming_soon_configuration")
 */
class ComingSoonConfiguration
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Active la maintenance de l'application
     *
     * @ORM\Column(type="boolean")
     */
    private $use_coming_soon;

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
    public function getUseComingSoon()
    {
        return $this->use_coming_soon;
    }

    /**
     * @param mixed $use_coming_soon
     */
    public function setUseComingSoon($use_coming_soon): void
    {
        $this->use_coming_soon = $use_coming_soon;
    }

}
