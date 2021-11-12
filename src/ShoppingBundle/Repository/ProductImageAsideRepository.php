<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Shopping\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\ProductImage;
use Shopping\Entity\ProductImageAside;
use Shopping\Entity\RandomPrintType;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductImageAsideRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductImageAside::class);
    }

}
