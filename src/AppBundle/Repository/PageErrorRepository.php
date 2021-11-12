<?php

namespace App\Repository;

use App\Entity\PageAbout;
use App\Entity\PageError;
use App\Entity\PageError404;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageErrorRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageError::class);
    }

}
