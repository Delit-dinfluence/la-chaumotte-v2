<?php

namespace App\Repository;

use App\Entity\Actualite;
use App\Entity\PageCategories;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ActualiteRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Actualite::class);
    }

    public function findByPattern($pattern, $searches = [], $sort_column = 'id', $sort_order = 'ASC')
    {
        $searches = array_merge([
            'by_designation' => true,
        ], $searches);


        $results = $this->createQueryBuilder('entity')
            ->LeftJoin('entity.translations', 'translation');

        if ($searches['by_designation']) {
            $results->orwhere('translation.designation LIKE :pattern');
        }

        return $results->setParameter('pattern', '%' . $pattern . '%')
            ->OrderBy('entity.' . $sort_column, $sort_order)
            ->getQuery()
            ->getResult();
    }


}
