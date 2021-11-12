<?php

namespace User\Repository;

use Core\Repository\Traits\EntityRepository;
use User\Entity\Team;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use User\Entity\UserGroup;

class UserGroupRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserGroup::class);
    }
}
