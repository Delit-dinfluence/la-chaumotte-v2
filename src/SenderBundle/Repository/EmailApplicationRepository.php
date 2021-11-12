<?php

namespace Sender\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Sender\Entity\Email;
use Sender\Entity\EmailApplication;
use Sender\Entity\EmailTemplate;
use Symfony\Bridge\Doctrine\RegistryInterface;

class EmailApplicationRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmailApplication::class);
    }

    public function findByKey($key)
    {
        $results = $this->createQueryBuilder('entity')
            ->Where('entity.dev_key LIKE :key')
            ->setParameter('key', '%' . $key . '%')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        if (count($results) > 0) {
            return $results[0];
        }
        return null;
    }
}
