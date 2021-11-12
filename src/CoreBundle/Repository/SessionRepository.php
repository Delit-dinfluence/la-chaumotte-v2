<?php

namespace Core\Repository;

use Core\Entity\Session;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SessionRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Session::class);
    }


    public function findSession($session_key)
    {
        $results = $this->createQueryBuilder('entity')
            ->where('entity.session_key LIKE :session_key')
            ->setParameter('session_key', $session_key)
            ->getQuery()
            ->getResult();

        if (count($results) > 0) {
            return $results[0];
        }

        return null;
    }

    public function findExpiredSession()
    {
        $results = $this->createQueryBuilder('entity')
            ->where('entity.session_expiration < :date_now')
            ->setParameter('date_now', date("Y-m-d h:i:s", time()))
            ->getQuery()
            ->getResult();

        return $results;
    }
}
