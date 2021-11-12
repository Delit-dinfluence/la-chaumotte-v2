<?php

namespace Shopping\Service\Payment;

use Doctrine\Common\Persistence\ManagerRegistry;
use Shopping\Service\Payment\CreditAgricole\CreditAgricoleManager;
use Shopping\Service\Payment\Paypal\PaypalManager;

class PaymentManager
{
    private $paymentManager;

    public function __construct(ManagerRegistry $entity_manager, $payment_method, $debug = true)
    {

        switch ($payment_method) {
            case 1:
                $this->paymentManager = new CreditAgricoleManager($entity_manager, $debug);
                break;
            case 2:
                break;
            case 3:
                $this->paymentManager = new PaypalManager($entity_manager, $debug);
                break;
            case 4:
                break;
        }

    }

    public function getTemplate()
    {
        return $this->paymentManager->getTemplate();
    }

    public function autoConfigurePayment($params)
    {
        return $this->paymentManager->autoConfigurePayment($params);
    }

    public function configurePayment($params)
    {
        return $this->paymentManager->configurePayment($params);
    }

    public function authorize()
    {
        return $this->paymentManager->authorize();
    }

    public function execute($payer_id, $payment_id)
    {
        return $this->paymentManager->execute($payer_id, $payment_id);
    }




    // TODO REMOVE

    public function getForm()
    {
        return $this->paymentManager->getForm();
    }

    public function getPayer()
    {
        return $this->paymentManager->getPayer();
    }

    public function getPayment()
    {
        return $this->paymentManager->getPayment();
    }


    public function verify($content, $headers)
    {
        return $this->paymentManager->verify($content, $headers);
    }

    public function setPaymentById($payment_id)
    {
        return $this->paymentManager->setPaymentById($payment_id);
    }

}
