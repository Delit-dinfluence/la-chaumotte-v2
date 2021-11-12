<?php

namespace App\Repository;

use App\Entity\PageAbout;
use App\Entity\PageCustomFour;
use App\Entity\PageCustomOne;
use App\Entity\PageCustomSix;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageCustomSixRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageCustomSix::class);
    }

}
