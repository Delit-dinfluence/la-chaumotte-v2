<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Shopping\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\RandomPrintType;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @param $category_id
     * @param string $sort_column
     * @param string $sort_order
     * @param bool $is_enabled
     * @return mixed
     */
    public function findByCategory($category_id, $sort_column = 'id', $sort_order = 'ASC', $is_enabled = true)
    {
        if ($is_enabled) {
            $results = $this->createQueryBuilder('entity')
                ->Where(':category MEMBER OF entity.categories')
                ->setParameter('category', $category_id)
                ->andWhere('entity.is_enabled = 1')
                ->OrderBy('entity.' . $sort_column, $sort_order)
                ->getQuery()
                ->getResult();
        } else {
            $results = $this->createQueryBuilder('entity')
                ->Where(':category MEMBER OF entity.categories')
                ->setParameter('category', $category_id)
                ->OrderBy('entity.' . $sort_column, $sort_order)
                ->getQuery()
                ->getResult();
        }
        return $results;
    }

    public function findByUri($slug)
    {
        $results = $this->createQueryBuilder('entity')
            ->LeftJoin('entity.translations', 'translation')
            ->Where('translation.uri LIKE :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getResult();

        if (count($results) > 0) {
            return $results[0];
        }

        return $results;
    }

    public function findByReference($slug)
    {
        $results = $this->createQueryBuilder('entity')
            ->Where('entity.reference LIKE :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getResult();

        if (count($results) > 0) {
            return $results[0];
        }

        return $results;
    }


    public function findByPattern($pattern, $searches = [], $sort_column = 'id', $sort_order = 'ASC')
    {
        $searches = array_merge([
            'by_reference' => false,
            'by_url' => false,
            'by_designation' => true,
            'by_keywords' => false,
        ], $searches);


        $results = $this->createQueryBuilder('entity')
            ->LeftJoin('entity.translations', 'translation');

        if ($searches['by_reference']) {
            $results->orwhere('entity.reference LIKE :pattern');
        }

        if ($searches['by_url']) {
            $results->orwhere('translation.url LIKE :pattern');
        }

        if ($searches['by_designation']) {
            $results->orwhere('translation.designation LIKE :pattern');
        }

        if ($searches['by_keywords']) {
            $results->orwhere('translation.keywords LIKE :pattern');
        }

        return $results->setParameter('pattern', '%' . $pattern . '%')
            ->OrderBy('entity.' . $sort_column, $sort_order)
            ->getQuery()
            ->getResult();
    }

    private function UniqueRandomNumbersWithinRange($min, $max, $quantity, $exclude)
    {
        $numbers = range($min, $max);
        shuffle($numbers);

        $array = array_slice($numbers, 0, $quantity);

        foreach ($array as $key => $value) {
            if (in_array($value, $exclude)) {
                unset($array[$key]);
            }
        }

        return $array;
    }

    public function findRandomProducts($array, $type)
    {

        $results = [];
        $exclude = [];

        if ($type == RandomPrintType::PACK) {


        }

        if ($type != RandomPrintType::ALL && ((count($results) < $array['count'] && $type == RandomPrintType::PACK) || $type == RandomPrintType::CATEGORY)) {

            $rest = $array['count'] - count($results);

            $totalRowsTable = $this->createQueryBuilder('entity')
                ->select('count(entity.id)')
                ->where('entity.is_enabled = 1 AND entity.id <> :id AND :category MEMBER OF entity.categories')
                ->setParameter('id', $array['id'])
                ->setParameter('category', $array['category'])
                ->getQuery()
                ->getSingleScalarResult();

            $random_ids = $this->UniqueRandomNumbersWithinRange(1, $totalRowsTable, $array['count'], $exclude);

            $results = array_merge($results, $this->createQueryBuilder('entity')
                ->where('entity.id IN (:ids)')
                ->setParameter('ids', $random_ids)
                ->setMaxResults($rest)
                ->getQuery()
                ->getResult());

            $exclude = array_merge($exclude, $random_ids);
        }


        if (count($results) < $array['count'] || $type == RandomPrintType::ALL) {

            $rest = $array['count'] - count($results);

            $totalRowsTable = $this->createQueryBuilder('entity')
                ->select('count(entity.id)')
                ->where('entity.is_enabled = 1 AND entity.id <> :id')
                ->setParameter('id', $array['id'])
                ->getQuery()
                ->getSingleScalarResult();

            $random_ids = $this->UniqueRandomNumbersWithinRange(1, $totalRowsTable, $array['count'], $exclude);

            $results = array_merge($results, $this->createQueryBuilder('entity')
                ->where('entity.id IN (:ids)')
                ->setParameter('ids', $random_ids)
                ->setMaxResults($rest)
                ->getQuery()
                ->getResult());
        }

        return $results;
    }
}
