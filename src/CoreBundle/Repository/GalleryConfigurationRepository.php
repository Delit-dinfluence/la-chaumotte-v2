<?php

namespace Core\Repository;

use Core\Entity\Configuration;
use Core\Entity\GalleryConfiguration;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class GalleryConfigurationRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GalleryConfiguration::class);
    }

}
