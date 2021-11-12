<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Shopping\Entity\Attribute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\PaymentCreditAgricole;
use Shopping\Entity\PaymentPaypal;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PaymentCreditAgricoleRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PaymentCreditAgricole::class);
    }

}
