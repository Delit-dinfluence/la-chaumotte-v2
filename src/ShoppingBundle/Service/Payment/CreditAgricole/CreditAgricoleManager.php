<?php

namespace Shopping\Service\Payment\CreditAgricole;

use Doctrine\Common\Persistence\ManagerRegistry;
use Shopping\Service\Payment\PaymentManagerInterface;
use Shopping\Entity\PaymentCreditAgricole;

class CreditAgricoleManager implements PaymentManagerInterface
{
    private $em;

    private $configuration;

    private $payment_manager;

    public function __construct(ManagerRegistry $em, $mode_debug)
    {
        $this->em = $em;

        // Manager
        $this->payment_manager = new CreditAgricole();

        // Configuration du paiement
        $this->configuration = $em->getRepository(PaymentCreditAgricole::class)->find(1);


        $this->payment_manager->setPayboxSite($this->configuration->getPayboxSite());
        $this->payment_manager->setPayboxRang($this->configuration->getPayboxRang());
        $this->payment_manager->setPayboxId($this->configuration->getPayboxId());
        $this->payment_manager->setPayboxUrlSuccess($this->configuration->getPayboxUrlSuccess());
        $this->payment_manager->setPayboxUrlReplyTo($this->configuration->getPayboxUrlReplyTo());
        $this->payment_manager->setPayboxUrlCancel($this->configuration->getPayboxUrlCancel());
        $this->payment_manager->setPayboxUrlFail($this->configuration->getPayboxUrlFail());
        $this->payment_manager->setPayboxSettingsCancel($this->configuration->getPayboxSettingsCancel());
        $this->payment_manager->setPayboxKeyHmac($this->configuration->getPayboxKeyHmac());
    }

    public function getTemplate(){
        return $this->payment_manager->getTemplate();
    }

    public function autoConfigurePayment($params)
    {
        $this->payment_manager->setPayboxBuyerEmail($params['email']);
        $this->payment_manager->setPayboxAmountTtc($params['amount_total_ttc']);
        $this->payment_manager->setPayboxOrder($params['reference'] . '-' . uniqid());

        return true;
    }

    public function configurePayment($params)
    {
        $this->payment_manager->setPayboxBuyerEmail($params['buyer_email']);
        $this->payment_manager->setPayboxAmountTtc($params['amount_total_ttc']);
        $this->payment_manager->setPayboxOrder($params['order_reference']. '-' . uniqid());

        return true;
    }

    public function authorization()
    {
        return false;
    }

    public function execute()
    {
        return false;
    }

}
