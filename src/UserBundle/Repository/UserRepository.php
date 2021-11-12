<?php

namespace User\Repository;

use Core\Repository\Traits\EntityRepository;
use User\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }


    public function findByEmail($email)
    {
        $results = $this->createQueryBuilder('entity')
            ->Where('entity.email LIKE :email')
            ->setParameter('email', '%' . $email . '%')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        if (count($results) > 0) {
            return $results[0];
        }

        return null;
    }


    public function findByUser($user)
    {
        $results = $this->createQueryBuilder('entity')
            ->Where('entity.id = ' . $user->getId())
            ->andWhere('entity.password LIKE :password')
            ->setParameter('password', '%' . $user->getPassword() . '%')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        if (count($results) > 0) {
            return $results[0];
        }

        return null;
    }

}
