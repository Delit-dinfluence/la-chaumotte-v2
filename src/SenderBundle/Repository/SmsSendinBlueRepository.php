<?php

namespace Sender\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Sender\Entity\SmsSendinBlue;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SmsSendinBlueRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SmsSendinBlue::class);
    }

}
