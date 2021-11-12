<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\ProductVariationAttribute;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductVariationAttributeRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductVariationAttribute::class);
    }

}
