<?php

namespace Sender\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Sender\Entity\Email;
use Symfony\Bridge\Doctrine\RegistryInterface;

class EmailRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Email::class);
    }

}
