<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\CartProduct;
use Shopping\Entity\ResearchKeyword;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ResearchKeywordRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ResearchKeyword::class);
    }

}
