<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration de la page de "Maintenance" de l'application
 *
 * @ORM\Entity(repositoryClass="Core\Repository\MaintenanceConfigurationRepository")
 * @ORM\Table(name="core_maintenance_configuration")
 */
class MaintenanceConfiguration
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
    private $use_maintenance;

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
    public function getUseMaintenance()
    {
        return $this->use_maintenance;
    }

    /**
     * @param mixed $use_maintenance
     */
    public function setUseMaintenance($use_maintenance): void
    {
        $this->use_maintenance = $use_maintenance;
    }

}
