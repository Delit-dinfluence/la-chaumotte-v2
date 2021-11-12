<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\Statistic;
use Symfony\Bridge\Doctrine\RegistryInterface;

class StatisticRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Statistic::class);
    }

}
