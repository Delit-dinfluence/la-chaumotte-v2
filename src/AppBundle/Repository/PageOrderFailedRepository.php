<?php

namespace App\Repository;

use App\Entity\PageCart;
use App\Entity\PageOrder;
use App\Entity\PageOrderFailed;
use App\Entity\PageOrderValidated;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageOrderFailedRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageOrderFailed::class);
    }

}
