<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Shopping\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class OrderRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Order::class);
    }


    public function findByReference($reference)
    {
        $results = $this->createQueryBuilder('entity')
            ->where('entity.reference LIKE :reference')
            ->setParameter('reference', $reference)
            ->getQuery()
            ->getResult();

        if (count($results) > 0) {
            return $results[0];
        }

        return $results;
    }
}
