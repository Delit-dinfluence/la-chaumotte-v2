<?php

namespace Core\Repository;

use Core\Entity\Configuration;
use Core\Entity\CookieConfiguration;
use Core\Entity\GoogleMapConfiguration;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class GoogleMapConfigurationRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GoogleMapConfiguration::class);
    }

}
