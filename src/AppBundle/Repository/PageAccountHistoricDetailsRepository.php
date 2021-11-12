<?php

namespace App\Repository;

use App\Entity\PageAbout;
use App\Entity\PageAccount;
use App\Entity\PageAccountHistoric;
use App\Entity\PageAccountHistoricDetails;
use App\Entity\PageAccountInfo;
use App\Entity\PageConnect;
use App\Entity\PageCustomFive;
use App\Entity\PageCustomOne;
use App\Entity\PageForgotPassword;
use App\Entity\PageRegister;
use App\Form\PageForgotPasswordType;
use Core\Repository\Traits\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PageAccountHistoricDetailsRepository extends ServiceEntityRepository
{
    use EntityRepository;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PageAccountHistoricDetails::class);
    }

}
