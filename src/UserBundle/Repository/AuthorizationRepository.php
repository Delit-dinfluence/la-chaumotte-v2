<?php

namespace User\Repository;

use Core\Repository\Traits\EntityRepository;
use User\Entity\Authorization;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AuthorizationRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Authorization::class);
    }

}
