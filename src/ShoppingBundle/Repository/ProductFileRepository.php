<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Shopping\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\ProductFile;
use Shopping\Entity\ProductImage;
use Shopping\Entity\RandomPrintType;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductFileRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductFile::class);
    }

}
