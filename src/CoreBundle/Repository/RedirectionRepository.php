<?php

namespace Core\Repository;

use Core\Entity\CorePageGeneral;
use Core\Entity\Redirection;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RedirectionRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Redirection::class);
    }

}
