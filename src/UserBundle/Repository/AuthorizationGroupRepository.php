<?php

namespace User\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use User\Entity\AuthorizationGroup;
use User\Entity\TeamAuthorization;

class AuthorizationGroupRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AuthorizationGroup::class);
    }

}
