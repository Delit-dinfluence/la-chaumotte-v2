<?php

namespace Sender\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Sender\Entity\EmailSendinBlue;
use Symfony\Bridge\Doctrine\RegistryInterface;

class EmailSendinBlueRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmailSendinBlue::class);
    }

}
