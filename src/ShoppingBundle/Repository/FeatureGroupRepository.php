<?php

namespace Shopping\Repository;

use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Shopping\Entity\AttributeGroup;
use Shopping\Entity\FeatureGroup;
use Symfony\Bridge\Doctrine\RegistryInterface;

class FeatureGroupRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FeatureGroup::class);
    }

}
