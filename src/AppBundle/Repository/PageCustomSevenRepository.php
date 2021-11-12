<?php

namespace App\Repository;

use App\Entity\PageAbout;
use App\Entity\PageCustomFive;
use App\Entity\PageCustomOne;
use App\Entity\PageCustomSeven;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageCustomSevenRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageCustomSeven::class);
    }

}
