<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\DeliveryExpress;
use Shopping\Entity\DeliveryHome;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DeliveryExpressRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DeliveryExpress::class);
    }

}
