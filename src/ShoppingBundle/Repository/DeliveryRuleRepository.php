<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\DeliveryRule;
use Shopping\Entity\DeliveryShop;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DeliveryRuleRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DeliveryRule::class);
    }

}
