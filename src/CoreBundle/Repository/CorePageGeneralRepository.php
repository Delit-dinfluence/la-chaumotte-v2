<?php

namespace Core\Repository;

use Core\Entity\CorePageGeneral;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CorePageGeneral|null find($id, $lockMode = null, $lockVersion = null)
 * @method CorePageGeneral|null findOneBy(array $criteria, array $orderBy = null)
 * @method CorePageGeneral[]    findAll()
 * @method CorePageGeneral[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorePageGeneralRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CorePageGeneral::class);
    }

    // /**
    //  * @return CorePageGeneral[] Returns an array of CorePageGeneral objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CorePageGeneral
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
