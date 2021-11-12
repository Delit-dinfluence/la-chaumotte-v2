<?php

namespace Sender\Service\Email;

use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use Sender\Entity\EmailSendinBlue;
use SendinBlue\Client\Api\AccountApi;
use SendinBlue\Client\Api\EmailCampaignsApi;
use SendinBlue\Client\Configuration;

class SendinBlue
{
    private $em;

    private $config;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;

        $this->initialize();
    }

    public function initialize()
    {
        $entity = $this->em->getRepository(EmailSendinBlue::class)->findWhere('entity.id = 1', 1);
        $this->config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $entity->getAccountKey());
    }

    public function getAccount()
    {
        $account = [
            'statut' => '<span class="danger">Indisponible</span> - <i>Veuillez verifier vos informations de connexion</i>',
            'firstName' => 'Inconnue',
            'lastName' => '',
            'email' => 'Inconnue',
            'companyName' => 'Inconnue',
            'address' => [
                'street' => 'Inconnue',
                'city' => '',
                'zipCode' => '',
                'country' => '',
            ],
            'emails' => [
                'type' => 'Inactif',
                'credits' => '0',
            ],
            'sms' => [
                'type' => 'Inactif',
                'credits' => '0'
            ]
        ];

        try {

            // Informations de connexions
            $apiInstance = new AccountApi(new Client(), $this->config);

            $item = $apiInstance->getAccount();
            $account = [
                'statut' => '<span class="success">Activé</span>',
                'firstName' => $item->getFirstName(),
                'lastName' => $item->getLastName(),
                'email' => $item->getEmail(),
                'companyName' => $item->getCompanyName(),
                'address' => [
                    'street' => $item->getAddress()->getStreet(),
                    'city' => $item->getAddress()->getCity(),
                    'zipCode' => $item->getAddress()->getZipCode(),
                    'country' => $item->getAddress()->getCountry(),
                ],
                'offer' => [
                    'type' => $item->getPlan()[0]->getType(),
                    'credits' => $item->getPlan()[0]->getCredits(),
                ]
            ];

        } catch (\Exception $e) {

        }

        return $account;
    }

    public function getCampaigns()
    {
        $compaigns = '';

        try {
            $apiInstance = new EmailCampaignsApi(new Client(), $this->config);

            $type = null;
            $status = null;
            $startDate = null;
            $endDate = null;
            $limit = 500;
            $offset = 0;

            $compaigns = $apiInstance->getEmailCampaigns($type, $status, $startDate, $endDate, $limit, $offset);
        } catch (\Exception $e) {

        }

        return $compaigns;
    }

    public function getCompaign()
    {

    }

}
