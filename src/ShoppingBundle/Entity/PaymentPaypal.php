<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moyen de paiement - Paypal
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\PaymentPaypalRepository")
 * @ORM\Table(name="shopping_payment_paypal")
 */
class PaymentPaypal extends Payment
{
    /**
     * Buisness ID
     *
     * @ORM\Column(type="string", length=255)
     */
    private $buisness_id;

    /**
     * Buisness TOKEN
     *
     * @ORM\Column(type="string", length=255)
     */
    private $buisness_token;

    /**
     * WebHook ID
     * @ORM\Column(type="string", length=255)
     */
    private $webhook_id;

    /**
     * Buisness ID
     *
     * @ORM\Column(type="string", length=255)
     */
    private $debug_buisness_id;

    /**
     * Buisness TOKEN
     *
     * @ORM\Column(type="string", length=255)
     */
    private $debug_buisness_token;

    /**
     * WebHook ID
     * @ORM\Column(type="string", length=255)
     */
    private $debug_webhook_id;

    /**
     * Type de monnaie (Euros, Dollars, ...)
     *
     * @ORM\Column(type="string", length=255)
     */
    private $currency;

    /**
     * Description du paiement
     *
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * Lien de retour
     *
     * @ORM\Column(type="string", length=255)
     */
    private $url_return;

    /**
     * Lien d'annulation
     *
     * @ORM\Column(type="string", length=255)
     */
    private $url_cancel;

    /**
     * Lien de notification
     *
     * @ORM\Column(type="string", length=255)
     */
    private $url_notify;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getBuisnessId()
    {
        return $this->buisness_id;
    }

    /**
     * @param mixed $buisness_id
     */
    public function setBuisnessId($buisness_id): void
    {
        $this->buisness_id = $buisness_id;
    }

    /**
     * @return mixed
     */
    public function getBuisnessToken()
    {
        return $this->buisness_token;
    }

    /**
     * @param mixed $buisness_token
     */
    public function setBuisnessToken($buisness_token): void
    {
        $this->buisness_token = $buisness_token;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getUrlReturn()
    {
        return $this->url_return;
    }

    /**
     * @param mixed $url_return
     */
    public function setUrlReturn($url_return): void
    {
        $this->url_return = $url_return;
    }

    /**
     * @return mixed
     */
    public function getUrlCancel()
    {
        return $this->url_cancel;
    }

    /**
     * @param mixed $url_cancel
     */
    public function setUrlCancel($url_cancel): void
    {
        $this->url_cancel = $url_cancel;
    }

    /**
     * @return mixed
     */
    public function getUrlNotify()
    {
        return $this->url_notify;
    }

    /**
     * @param mixed $url_notify
     */
    public function setUrlNotify($url_notify): void
    {
        $this->url_notify = $url_notify;
    }

    /**
     * @return mixed
     */
    public function getWebhookId()
    {
        return $this->webhook_id;
    }

    /**
     * @param mixed $webhook_id
     */
    public function setWebhookId($webhook_id): void
    {
        $this->webhook_id = $webhook_id;
    }

    /**
     * @return mixed
     */
    public function getDebugBuisnessId()
    {
        return $this->debug_buisness_id;
    }

    /**
     * @param mixed $debug_buisness_id
     */
    public function setDebugBuisnessId($debug_buisness_id): void
    {
        $this->debug_buisness_id = $debug_buisness_id;
    }

    /**
     * @return mixed
     */
    public function getDebugBuisnessToken()
    {
        return $this->debug_buisness_token;
    }

    /**
     * @param mixed $debug_buisness_token
     */
    public function setDebugBuisnessToken($debug_buisness_token): void
    {
        $this->debug_buisness_token = $debug_buisness_token;
    }

    /**
     * @return mixed
     */
    public function getDebugWebhookId()
    {
        return $this->debug_webhook_id;
    }

    /**
     * @param mixed $debug_webhook_id
     */
    public function setDebugWebhookId($debug_webhook_id): void
    {
        $this->debug_webhook_id = $debug_webhook_id;
    }


}
