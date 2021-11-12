<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Shopping\Repository\PaymentCreditAgricoleRepository")
 * @ORM\Table(name="shopping_payment_credit_agricole")
 */
class PaymentCreditAgricole extends Payment
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paybox_site;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paybox_rang;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paybox_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paybox_url_success;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paybox_url_reply_to;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paybox_url_cancel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paybox_url_fail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paybox_settings_cancel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paybox_key_hmac;

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
    public function getPayboxUrlReplyTo()
    {
        return $this->paybox_url_reply_to;
    }

    /**
     * @param mixed $paybox_url_reply_to
     */
    public function setPayboxUrlReplyTo($paybox_url_reply_to): void
    {
        $this->paybox_url_reply_to = $paybox_url_reply_to;
    }

    /**
     * @return mixed
     */
    public function getPayboxSite()
    {
        return $this->paybox_site;
    }

    /**
     * @param mixed $paybox_site
     */
    public function setPayboxSite($paybox_site): void
    {
        $this->paybox_site = $paybox_site;
    }

    /**
     * @return mixed
     */
    public function getPayboxRang()
    {
        return $this->paybox_rang;
    }

    /**
     * @param mixed $paybox_rang
     */
    public function setPayboxRang($paybox_rang): void
    {
        $this->paybox_rang = $paybox_rang;
    }

    /**
     * @return mixed
     */
    public function getPayboxId()
    {
        return $this->paybox_id;
    }

    /**
     * @param mixed $paybox_id
     */
    public function setPayboxId($paybox_id): void
    {
        $this->paybox_id = $paybox_id;
    }

    /**
     * @return mixed
     */
    public function getPayboxUrlSuccess()
    {
        return $this->paybox_url_success;
    }

    /**
     * @param mixed $paybox_url_success
     */
    public function setPayboxUrlSuccess($paybox_url_success): void
    {
        $this->paybox_url_success = $paybox_url_success;
    }

    /**
     * @return mixed
     */
    public function getPayboxUrlCancel()
    {
        return $this->paybox_url_cancel;
    }

    /**
     * @param mixed $paybox_url_cancel
     */
    public function setPayboxUrlCancel($paybox_url_cancel): void
    {
        $this->paybox_url_cancel = $paybox_url_cancel;
    }

    /**
     * @return mixed
     */
    public function getPayboxUrlFail()
    {
        return $this->paybox_url_fail;
    }

    /**
     * @param mixed $paybox_url_fail
     */
    public function setPayboxUrlFail($paybox_url_fail): void
    {
        $this->paybox_url_fail = $paybox_url_fail;
    }

    /**
     * @return mixed
     */
    public function getPayboxSettingsCancel()
    {
        return $this->paybox_settings_cancel;
    }

    /**
     * @param mixed $paybox_settings_cancel
     */
    public function setPayboxSettingsCancel($paybox_settings_cancel): void
    {
        $this->paybox_settings_cancel = $paybox_settings_cancel;
    }

    /**
     * @return mixed
     */
    public function getPayboxKeyHmac()
    {
        return $this->paybox_key_hmac;
    }

    /**
     * @param mixed $paybox_key_hmac
     */
    public function setPayboxKeyHmac($paybox_key_hmac): void
    {
        $this->paybox_key_hmac = $paybox_key_hmac;
    }

}
