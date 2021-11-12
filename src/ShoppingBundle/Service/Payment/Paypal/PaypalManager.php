<?php

namespace Shopping\Service\Payment\Paypal;

use Core\Entity\AppConfiguration;
use Core\Entity\Configuration;
use Doctrine\Common\Persistence\ManagerRegistry;
use Shopping\Entity\PaymentPaypal;

class PaypalManager
{
    private $em;

    private $configuration;

    private $general;

    private $paypalManager;


    public function __construct(ManagerRegistry $em, $debug)
    {
        $this->em = $em;
        $this->configuration = $em->getRepository(PaymentPaypal::class)->findWhere('entity.id = 1', 1);
        $this->general = $em->getRepository(AppConfiguration::class)->findWhere('entity.id = 1', 1);

        if ($debug) {

            // Sandbox
            $this->paypalManager = new Paypal($this->configuration->getDebugBuisnessId(), $this->configuration->getDebugBuisnessToken(), $debug);
        } else {

            // Live
            $this->paypalManager = new Paypal($this->configuration->getBuisnessId(), $this->configuration->getBuisnessToken(), $debug);
        }
    }


    public function getTemplate()
    {
        return null;
    }

    /**
     * Configure le paiement automatiquement avec la commande et le panier
     */
    public function autoConfigurePayment($order)
    {
        $this->paypalManager->setPayer('paypal');

        $this->paypalManager->setItemsWithCart($order->getCart(), $this->configuration->getCurrency());
        $this->paypalManager->setDetails($order->getSubTotal(), $order->getTax(), $order->getShippingPrice());
        $this->paypalManager->setAmount($order->getTotal(), $this->configuration->getCurrency());

        $this->paypalManager->setTransaction($this->configuration->getDescription(), $order->getReference(), $this->configuration->getUrlNotify());
        $this->paypalManager->setUrls($this->general->getDomain() . '/payment-success', $this->configuration->getUrlCancel());
        $this->paypalManager->setPayment();

//        $this->paypalManager->createWebhook( $this->configuration->getUrlNotify());

        $this->paypalManager->createPayment();
        return true;
    }


    /**
     * Configure le paiement manuellement avec un tableau
     */
    public function configurePayment($array)
    {
        $this->paypalManager->setPayer($array['payer']);

        $this->paypalManager->setItemsWithCart($array['items']);
        $this->paypalManager->setDetails($array['subtotal'], $array['tax'], $array['shipping']);
        $this->paypalManager->setAmount($array['total'], $array['currency']);

        $this->paypalManager->setTransaction($array['description'], $array['reference'], $array['notify_url']);
        $this->paypalManager->setUrls($array['url_return'], $array['url_cancel']);
        $this->paypalManager->setPayment();

//        $this->paypalManager->createWebhook($array['url_webbook'],$array['events_webhook']);

        $this->paypalManager->createPayment();

        return true;
    }

    public function getPayer()
    {
        return $this->paypalManager->getPayer();
    }

    public function getPayment()
    {
        return $this->paypalManager->getPayment();
    }

    /**
     * Execute le paiement
     */
    public function execute($payer_id, $payment_id)
    {
        return $this->paypalManager->execute($payer_id, $payment_id);
    }

    public function authorize()
    {
        return $this->paypalManager->authorize();
    }

    public function verify($content, $headers)
    {
        return $this->paypalManager->verify($content, $headers);
    }

    public function setPaymentById($payment_id)
    {
        return $this->paypalManager->setPaymentById($payment_id);
    }
}
