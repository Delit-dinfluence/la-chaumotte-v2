<?php

namespace Shopping\Service\Payment\Paypal;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use PayPal\Api\Payment;
use PayPal\Api\VerifyWebhookSignature;
use PayPal\Api\Webhook;
use PayPal\Api\WebhookEventType;
use Shopping\Entity\PaymentPaypal;
use Shopping\Service\Payment\PaymentInterface;
use PayPal\Api\ItemList;

class Paypal
{
    private $transaction;

    private $settings;

    private $apiContext;

    private $payer;

    private $items;

    private $amount;

    private $details;

    private $urls;

    private $payment;


    public function __construct($buisnessId, $buisnessToken, $debug)
    {
        $this->setApiContext($buisnessId, $buisnessToken, $debug);
    }


    /**
     *
     */
    public function setApiContext($buisness_id, $buisness_token, $debug)
    {
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential($buisness_id, $buisness_token)
        );

        ($debug == true ? $mode = 'sandbox' : $mode = 'live');

        $this->apiContext->setConfig(
            array(
                'log.LogEnabled' => true,
                'log.FileName' => '../var/cache/PayPal.log',
                'log.LogLevel' => 'DEBUG',
                'mode' => $mode
            )
        );

    }

    /**
     * A resource representing a Payer that funds a payment For paypal account payments, set payment method to 'paypal'.
     */
    public function setPayer($payer)
    {
        $this->payer = (new \PayPal\Api\Payer())
            ->setPaymentMethod($payer);
    }

    /**
     * Use this optional field to set additional payment information such as tax, shipping charges etc.
     */
    public function setDetails($subtotal, $tax = 0, $shipping = 0)
    {
        $this->details = (new \PayPal\Api\Details())
            ->setShipping($shipping)
            ->setTax($tax)
            ->setSubtotal($subtotal);
    }


    /**
     * Lets you specify a payment amount. You can also specify additional details such as shipping, tax.
     */
    public function setAmount($total, $currency)
    {
        $this->amount = (new \PayPal\Api\Amount())
            ->setTotal($total)
            ->setCurrency($currency)
            ->setDetails($this->details);
    }


    /**
     * A transaction defines the contract of a payment - what is the payment for and who is fulfilling it.
     */
    public function setTransaction($payment_description, $order_reference, $notify_url)
    {
        $this->transaction = (new \PayPal\Api\Transaction())
            ->setItemList($this->items)
            ->setDescription($payment_description)
            ->setAmount($this->amount)
            ->setInvoiceNumber($order_reference)
            ->setNotifyUrl($notify_url);
    }


    /**
     * Set the urls that the buyer must be redirected to after payment approval/ cancellation.
     */
    public function setUrls($url_return, $url_cancel)
    {
        $this->urls = (new \PayPal\Api\RedirectUrls())
            ->setReturnUrl($url_return)
            ->setCancelUrl($url_cancel);
    }


    /**
     * A Payment Resource
     */
    public function setPayment($intent = 'sale')
    {
        $this->payment = (new \PayPal\Api\Payment())
            ->setIntent($intent)
            ->setPayer($this->payer)
            ->setRedirectUrls($this->urls)
            ->addTransaction($this->transaction);
    }


    public function createWebhook($url)
    {
        $webhookEventTypes = \PayPal\Api\WebhookEventType::availableEventTypes($this->apiContext);

        $webhook = (new \PayPal\Api\Webhook())
            ->setUrl($url);


        $webhook->setEventTypes($webhookEventTypes->event_types);

        try {

            $output = $webhook->create($this->apiContext);

        } catch (\Exception $e) {

            $webhookList = \PayPal\Api\Webhook::getAll($this->apiContext);

            foreach ($webhookList->getWebhooks() as $webhook) {
                $webhook->delete($this->apiContext);
            }

            try {
                $output = $webhook->create($this->apiContext);
            } catch (\Exception $ex) {

                dump($ex);
                die();
            }
        }

        return $output;
    }


    /**
     * Create a payment by calling the 'create' method passing it a valid apiContext.
     * The return object contains the state and the url to which the buyer must be redirected to for payment approval
     */
    public function createPayment()
    {
        try {
            $this->payment->create($this->apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $e) {
            throw new \Exception($e->getData());
        }
    }


    public function setItemsWithCart($cart, $currency)
    {
        $this->items = new \PayPal\Api\ItemList();

        foreach ($cart->getProducts() as $row) {
            $product = $row->getProduct();

            $item = (new \PayPal\Api\Item())
                ->setName($product->getDesignation())
                ->setPrice($row->getProduct()->getPriceHt())
                ->setCurrency($currency)
                ->setQuantity($row->getQuantity());

            $this->items->addItem($item);
        }

    }

    public function setItems($array)
    {
        $this->items = new \PayPal\Api\ItemList();

        foreach ($array as $row) {

            $item = (new \PayPal\Api\Item())
                ->setName($row['designation'])
                ->setPrice($row['price'])
                ->setCurrency($row['currency'])
                ->setQuantity($row['quantity']);

            $this->items->addItem($item);
        }
    }

    public function execute($payer_id, $payment_id)
    {
        $execution = (new \PayPal\Api\PaymentExecution())
            ->setPayerId($payer_id);

        try {
            return $this->payment->execute($execution, $this->apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $e) {

            dump($e);
            die();
        }

    }

    public function setPaymentById($payment_id)
    {
        $this->payment = Payment::get($payment_id, $this->apiContext);
        return $this->payment;
    }

    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @return mixed
     */
    public function authorize()
    {
        return $this->payment->getApprovalLink();
    }

    public function getPayer()
    {
        return $this->payment->getPayer();
    }

    public function verify($content, $headers)
    {
        try {
            $headers = array_change_key_case($headers, CASE_UPPER);

            $signatureVerification = new VerifyWebhookSignature();
            $signatureVerification->setAuthAlgo($headers['PAYPAL-AUTH-ALGO']);
            $signatureVerification->setTransmissionId($headers['PAYPAL-TRANSMISSION-ID']);
            $signatureVerification->setCertUrl($headers['PAYPAL-CERT-URL']);
            $signatureVerification->setWebhookId("2RA87344BD8203609"); // Note that the Webhook ID must be a currently valid Webhook that you created with your client ID/secret.
            $signatureVerification->setTransmissionSig($headers['PAYPAL-TRANSMISSION-SIG']);
            $signatureVerification->setTransmissionTime($headers['PAYPAL-TRANSMISSION-TIME']);
            $signatureVerification->setRequestBody($content);

            return $signatureVerification->post($this->apiContext);

        } catch (\Exception $e) {

            return [
                'error_code' => 500,
                'content' => $e
            ];
        }
    }
}