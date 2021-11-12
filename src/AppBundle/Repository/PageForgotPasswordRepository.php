<?php

namespace App\Repository;

use App\Entity\PageAbout;
use App\Entity\PageConnect;
use App\Entity\PageCustomFive;
use App\Entity\PageCustomOne;
use App\Entity\PageForgotPassword;
use App\Entity\PageRegister;
use App\Form\PageForgotPasswordType;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageForgotPasswordRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageForgotPassword::class);
    }

}
