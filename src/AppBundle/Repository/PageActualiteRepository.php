<?php

namespace App\Repository;

use App\Entity\Actualite;
use App\Entity\PageActualite;
use App\Entity\PageCategories;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageActualiteRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageActualite::class);
    }

}
