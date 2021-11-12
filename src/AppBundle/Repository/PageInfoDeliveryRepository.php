<?php

namespace App\Repository;

use App\Entity\PageCgv;
use App\Entity\PageInfoDelivery;
use App\Entity\PageNotice;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageInfoDeliveryRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageInfoDelivery::class);
    }

}
