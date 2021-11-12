<?php

namespace Shopping\Service\Payment\CreditAgricole;

use DOMDocument;

class CreditAgricole
{
    /**
     * Numéro du magasin
     */
    private $paybox_site;

    /**
     * Numéro de rang
     * NB: Utiliser les deux derniers chiffres
     */
    private $paybox_rang;

    /**
     * Identifiant Paybox
     */
    private $paybox_id;

    /**
     * Référence de la commande
     */
    private $paybox_order;

    /**
     * Email de l'acheteur
     */
    private $paybox_buyer_email;

    /**
     * Prix total TTC
     */
    private $paybox_amount_ttc;

    /**
     * URL de retour : Paiement validé
     */
    private $paybox_url_success;

    /**
     * URL de retour :
     */
    private $paybox_url_reply_to;

    /**
     * URL de retour : Paiement annulé
     */
    private $paybox_url_cancel;

    /**
     * URL de retour : Paiement refusé
     */
    private $paybox_url_fail;

    /**
     * Configuration des variables de retour
     */
    private $paybox_settings_cancel;

    /**
     * Clé HMAC
     */
    private $paybox_key_hmac;

    /**
     * Retourne l'URL d'un serveur disponible
     */
    public function check_serveur($debug = true)
    {
        $serveur_primaire = 'preprod-tpeweb.paybox.com';
        $serveur_secondaire = 'preprod-tpeweb1.paybox.com';

        $serveurs = array($serveur_primaire, $serveur_secondaire);


        // Recherche d'un serveur de production utilisable
        foreach ($serveurs as $serveur) {

            $doc = new DOMDocument();
            $doc->loadHTMLFile('https://' . $serveur . '/load.html');

            $server_status = "";
            $element = $doc->getElementById('server_status');

            if ($element) {
                $server_status = $element->textContent;
            }

            if ($server_status == "OK") {
                $server = $serveur;
                break;
            }

        }

        // Aucun serveur disponible pour le moment
        if (!$server) {
            throw new \Exception('No available server', 503);
        }

        // Utilisation du serveur de pre-production
        if ($debug) {
            $server = 'preprod-tpeweb.paybox.com';
        }

        //Création de l'URL CGI du serveur
        return 'https://' . $server . '/cgi/MYchoix_pagepaiement.cgi';
    }

    /**
     * Execute le paiement
     */
    public function getTemplate()
    {
        // URL d'un serveur disponible
        $serveur_link = $this->check_serveur();

        // On récupère la date au format ISO-8601
        $dateTime = date("c");

        $params = [
            "PBX_SITE" => $this->paybox_site,
            "PBX_RANG" => $this->paybox_rang,
            "PBX_IDENTIFIANT" => $this->paybox_id,
            "PBX_RETOUR" => $this->paybox_settings_cancel,
            "PBX_CMD" => $this->paybox_order,
            "PBX_TOTAL" => $this->paybox_amount_ttc,
            "PBX_DEVISE" => "978",
            "PBX_PORTEUR" => $this->paybox_buyer_email,
            "PBX_HASH" => "SHA512",
            "PBX_TIME" => $dateTime,
            "PBX_EFFECTUE" => $this->paybox_url_success,
            "PBX_REFUSE" => $this->paybox_url_fail,
            "PBX_ANNULE" => $this->paybox_url_cancel,
            "PBX_ATTENTE" => $this->paybox_url_cancel,
            "PBX_REPONDRE_A" => $this->paybox_url_reply_to,
        ];


        $message = '';
        foreach ($params as $key => $value) {
            $message .= $key . '=' . $value . '&';
        }

        // Si la clé est en ASCII, On la transforme en binaire
        $binKey = pack("H*", $this->paybox_key_hmac);

        $params['PBX_HMAC'] = $hmac = strtoupper(hash_hmac('sha512', substr($message, 0, -1), $binKey));

        return [
            'template' => 'credit_agricole_form',
            'serveur_link' => $serveur_link,
            'params' => $params,
        ];
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
    public function getPayboxOrder()
    {
        return $this->paybox_order;
    }

    /**
     * @param mixed $paybox_order
     */
    public function setPayboxOrder($paybox_order): void
    {
        $this->paybox_order = $paybox_order;
    }

    /**
     * @return mixed
     */
    public function getPayboxBuyerEmail()
    {
        return $this->paybox_buyer_email;
    }

    /**
     * @param mixed $paybox_buyer_email
     */
    public function setPayboxBuyerEmail($paybox_buyer_email): void
    {
        $this->paybox_buyer_email = $paybox_buyer_email;
    }

    /**
     * @return mixed
     */
    public function getPayboxAmountTtc()
    {
        return $this->paybox_amount_ttc;
    }

    /**
     * @param mixed $paybox_amount_ttc
     */
    public function setPayboxAmountTtc($paybox_amount_ttc): void
    {
        $this->paybox_amount_ttc = $paybox_amount_ttc * 100;
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
