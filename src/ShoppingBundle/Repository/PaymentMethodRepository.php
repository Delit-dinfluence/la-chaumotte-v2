<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\PaymentMethod;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PaymentMethodRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PaymentMethod::class);
    }

}
