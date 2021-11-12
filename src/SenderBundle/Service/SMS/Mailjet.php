<?php

namespace Sender\Service\SMS;

use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
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
