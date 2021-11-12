<?php


namespace Shopping\Service\Payment;


interface PaymentManagerInterface
{
    /**
     * Retourne le bouton "Payer" configuré pour le moyen de paiement
     */
    public function getTemplate();

    /**
     * Configure le paiement automatiquement en fonction de la commande
     */
    public function autoConfigurePayment($order);

    /**
     * Configure manuellement un paiement
     */
    public function configurePayment($params);

    /**
     * Déclanche une autorisation de paiement
     */
    public function authorization();

    /**
     * Execution du paiement
     */
    public function execute();

}