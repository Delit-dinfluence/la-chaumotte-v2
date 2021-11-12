<?php

namespace App\Repository;

use App\Entity\PageAbout;
use App\Entity\PageComingSoon;
use App\Entity\PageMaintenance;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageMaintenanceRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageMaintenance::class);
    }

}
