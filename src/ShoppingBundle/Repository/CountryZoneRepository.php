<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\Country;
use Shopping\Entity\CountryZone;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CountryZoneRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CountryZone::class);
    }

}
