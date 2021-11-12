<?php

namespace App\Repository;

use App\Entity\PageProducts;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageProductsRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageProducts::class);
    }

}
