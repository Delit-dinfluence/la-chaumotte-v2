<?php

namespace Sender\Service\Email;

use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use Sender\Entity\EmailMailjet;
use SendinBlue\Client\Api\AccountApi;
use SendinBlue\Client\Api\EmailCampaignsApi;
use SendinBlue\Client\Api\SMSCampaignsApi;
use SendinBlue\Client\Configuration;

class Mailjet
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;

        $this->initialize();
    }

    public function initialize()
    {
    }

    public function getAccount()
    {

    }

    public function getCampaigns()
    {

    }

    public function getCompaign()
    {

    }

}
