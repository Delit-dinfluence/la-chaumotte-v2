<?php

namespace Sender\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Sender\Entity\SmsMode;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SmsModeRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SmsMode::class);
    }

}
