<?php

namespace Sender\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Sender\Entity\Email;
use Sender\Entity\Newsletter;
use Symfony\Bridge\Doctrine\RegistryInterface;

class NewsletterRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Newsletter::class);
    }

}
