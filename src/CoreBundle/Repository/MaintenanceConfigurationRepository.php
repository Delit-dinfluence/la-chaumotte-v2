<?php

namespace Core\Repository;

use Core\Entity\MaintenanceConfiguration;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class MaintenanceConfigurationRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MaintenanceConfiguration::class);
    }

}
