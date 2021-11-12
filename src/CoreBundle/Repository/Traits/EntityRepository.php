<?php

namespace Core\Repository\Traits;

trait EntityRepository
{

    /**
     * @param string $column
     * @param string $sort
     * @param bool $where_is_enabled
     * @return mixed
     */
    public function findAllEntities($column = 'id', $sort = 'ASC', $where_is_enabled = true)
    {
        if ($where_is_enabled) { // Retourne les entité active $sort par $column
            $results = $this->createQueryBuilder('c')
                ->Where('c.is_enabled = 1')
                ->orderBy('c.' . $column, $sort)
                ->getQuery()
                ->getResult();
        } else { // Retourne toutes les entité $sort par $cplumn
            $results = $this->createQueryBuilder('c')
                ->OrderBy('c.' . $column, $sort)
                ->getQuery()
                ->getResult();
        }

        return $results;
    }

    /**
     * @param $value
     * @param string $column
     * @param int $limit
     * @return mixed
     */
    public function findByColumn($value, $column = 'id', $limit = 1)
    {
        if ($value == null) { // Récupère toutes les entité où $column est null
            $result = $this->createQueryBuilder('c')
                ->andWhere('c.' . $column . ' is null')
                ->setMaxResults($limit)
                ->getQuery()
                ->getResult();
        } else { // Récupère toutes les entité où $colonne = $value
            $result = $this->createQueryBuilder('c')
                ->andWhere('c.' . $column . ' = :val')
                ->setParameter('val', $value)
                ->setMaxResults($limit)
                ->getQuery()
                ->getResult();

            // Retourne une entité si il n'y a qu'un seul résultat
            if ($limit == 1 && count($result) > 0) {
                return $result[0];
            }
        }

        return $result;
    }

    /**
     * @param string $column
     * @param string $condition
     * @param int $limit
     * @param string $sort_column
     * @param string $sort_order
     * @return mixed
     */
    public function findWhere($condition, $limit = -1, $sort_column = 'id', $sort_order = 'ASC')
    {
        if ($limit > 0) { // Retourne $limit entité where $column $condition
            $results = $this->createQueryBuilder('entity')
                ->where($condition)
                ->setMaxResults($limit)
                ->OrderBy('entity.' . $sort_column, $sort_order)
                ->getQuery()
                ->getResult();


            // Retourne une entité si il n'y a qu'un seul résultat
            if ($limit == 1 && count($results) > 0) {
                return $results[0];
            }

        } else { // Retourne toutes les entité where $column $condition
            $results = $this->createQueryBuilder('entity')
                ->where($condition)
                ->OrderBy('entity.' . $sort_column, $sort_order)
                ->getQuery()
                ->getResult();

        }
        return $results;
    }


    public function countWhere($select, $condition)
    {
        return $this->createQueryBuilder('entity')
            ->select('count(' . $select . ')')
            ->where($condition)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findMember($value, $column, $limit = -1, $sort_column = 'id', $sort_order = 'ASC')
    {
        if ($limit > 0) { // Retourne $limit entité where $column $condition

            $results = $this->createQueryBuilder('entity')
                ->Where(':tag MEMBER OF entity.' . $column)
                ->setParameter('tag', $value)
                ->setMaxResults($limit)
                ->OrderBy('entity.' . $sort_column, $sort_order)
                ->getQuery()
                ->getResult();

            if ($limit == 1 && count($results) > 0) {
                return $results[0];
            }
        } else {
            $results = $this->createQueryBuilder('entity')
                ->Where(':tag MEMBER OF entity.' . $column)
                ->setParameter('tag', $value)
                ->OrderBy('entity.' . $sort_column, $sort_order)
                ->getQuery()
                ->getResult();
        }
        return $results;
    }


    public function findByUrl($slug)
    {
        $results = $this->createQueryBuilder('entity')
            ->LeftJoin('entity.translations', 'translation')
            ->where('translation.url LIKE :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getResult();

        if (count($results) > 0) {
            return $results[0];
        }

        return $results;
    }

    public function findBySlug($slug)
    {
        $results = $this->createQueryBuilder('entity')
            ->where('entity.slug LIKE :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getResult();

        if (count($results) > 0) {
            return $results[0];
        }

        return $results;
    }

}