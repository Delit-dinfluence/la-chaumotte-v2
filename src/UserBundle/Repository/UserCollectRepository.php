<?php

namespace User\Repository;

use Core\Repository\Traits\EntityRepository;
use User\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use User\Entity\UserCollect;

class UserCollectRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserCollect::class);
    }

}
