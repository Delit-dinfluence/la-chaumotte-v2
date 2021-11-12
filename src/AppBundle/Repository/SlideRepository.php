<?php

namespace App\Repository;

use App\Entity\Actualite;
use App\Entity\PageCategories;
use App\Entity\Slide;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SlideRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Slide::class);
    }

}
