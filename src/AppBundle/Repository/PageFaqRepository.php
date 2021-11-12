<?php

namespace App\Repository;

use App\Entity\PageCgv;
use App\Entity\PageFaq;
use App\Entity\PageInfoDelivery;
use App\Entity\PageInfoPayment;
use App\Entity\PageNotice;
use App\Form\PageFaqType;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageFaqRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageFaq::class);
    }

}
