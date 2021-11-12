<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\ReductionCode;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ReductionCodeRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReductionCode::class);
    }

}
