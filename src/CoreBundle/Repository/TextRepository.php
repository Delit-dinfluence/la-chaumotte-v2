<?php

namespace Core\Repository;

use Core\Entity\Text;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TextRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Text::class);
    }


    public function countAll()
    {
        $results = $this->createQueryBuilder('entity')
            ->LeftJoin('entity.translations', 'translation')
            ->select('count(entity.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $results;
    }

    public function countExpression($language = 'fr')
    {
        $results = $this->createQueryBuilder('entity')
            ->LeftJoin('entity.translations', 'translation')
            ->select('count(translation.id)')
            ->where('translation.locale LIKE :locale')
            ->setParameter('locale', '%'.$language.'%')
            ->getQuery()
            ->getSingleScalarResult();

        return $results;
    }
}
