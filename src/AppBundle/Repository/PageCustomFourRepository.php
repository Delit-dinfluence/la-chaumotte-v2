<?php

namespace App\Repository;

use App\Entity\PageAbout;
use App\Entity\PageCustomFour;
use App\Entity\PageCustomOne;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageCustomFourRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageCustomFour::class);
    }

}
