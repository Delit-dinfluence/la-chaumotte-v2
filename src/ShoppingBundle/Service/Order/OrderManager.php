<?php

namespace Shopping\Service\Order;

use Core\Service\Session\Session;
use Doctrine\Common\Persistence\ManagerRegistry;
use Shopping\Entity\DeliveryMethod;
use Shopping\Entity\OrderStatus;
use Shopping\Entity\PaymentMethod;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * OrderManager s'occupe de toute la gestion des commandes ECommerce
 */
class OrderManager
{
    /**
     * Commande
     */
    private $order;

    /**
     * Commande en session
     */
    private $order_session;

    /**
     * ManagerRegistry
     */
    private $em;

    /**
     * Constructeur
     */
    public function __construct(Session $session, ManagerRegistry $em)
    {
        $this->em = $em;
        $this->order_session = new OrderSession($session);
        $this->order = $this->order_session->getOrderFromSession();
    }


    public function setEmail($params)
    {
        $this->order->setEmail($params); // Modifie l'adresse de livraison
        $this->order_session->persist($this->order); // Modifie la commande en session
    }


    public function setDeliveryAddress($params)
    {
        $this->order->setDeliveryAddress($params); // Modifie l'adresse de livraison
        $this->order_session->persist($this->order); // Modifie la commande en session
    }

    public function setInvoiceAddress($params)
    {
        $this->order->setInvoiceAddress($params); // Modifie l'adresse de facturation
        $this->order_session->persist($this->order); // Modifie la commande en session
    }


    public function setDeliveryMethod($params)
    {
        $this->order->setDeliveryMethod($params); // Modifie le moyen de livraison de la commande
        $this->order_session->persist($this->order); // Modifie la commande en session
    }

    public function setAddressDelivery($params)
    {
        $this->order->setAddressDelivery($params); // Modifie le moyen de livraison de la commande
        $this->order_session->persist($this->order); // Modifie la commande en session
    }

    public function setAddressInvoice($params)
    {
        $this->order->setAddressInvoice($params); // Modifie le moyen de livraison de la commande
        $this->order_session->persist($this->order); // Modifie la commande en session
    }

    public function updateDeliveryPrice($productsNumber, $subTotalHT, $totalWeight = null)
    {
        $order = $this->order->getOrder();

        $method = $this->em->getRepository(DeliveryMethod::class)->findOneBy([
            'is_enabled' => 1,
            'id' => $order->getDeliverymethod()
        ]);

        $class = $method->getControllerModule() . '\Entity\\' . $method->getControllerEntity();
        $delivery = $this->em->getRepository($class)->findOneBy(['id' => 1]);

        $order->setDeliveryPrice(-1);


        $deliveryPrices = [];

        foreach ($delivery->getRules()->toArray() as $rule) {

            switch ($rule->getChargeType()) {

                case 0: // Prix

                    if (
                        ($rule->getLimitLower() == null || $subTotalHT > $rule->getLimitLower())
                        &&
                        ($rule->getLimitUpper() == null || $subTotalHT < $rule->getLimitUpper())
                    ) {

                        $deliveryPrices[] = $rule;
                    }

                    break;

                case 2: // Quantite

                    if (
                        ($rule->getLimitLower() == null || $productsNumber > $rule->getLimitLower() || ($rule->getLimitLowerOrEqual() && $productsNumber == $rule->getLimitLower()))
                        &&
                        ($rule->getLimitUpper() == null || $productsNumber < $rule->getLimitUpper() || ($rule->getLimitUpperOrEqual() && $productsNumber == $rule->getLimitUpper()))
                    ) {

                        $deliveryPrices[] = $rule;

                    }

                    break;
            }

        }

        foreach ($deliveryPrices as $rule) {
            $this->setDeliveryCharge($order, $delivery, $rule);
        }

        $this->order_session->persist($this->order); // Modifie la commande en session
    }

    private function setDeliveryCharge($order, $delivery, $rule)
    {
        $oldPrice = $order->getDeliveryPrice();
        $newprice = $rule->getChargePrice();

        switch ($delivery->getOutOfRangeBehavior()) {
            case 0:

                if ($newprice > $oldPrice || $oldPrice < 0) {
                    $order->setDeliveryPrice($newprice);
                }

                break;

            case 1:

                if ($newprice < $oldPrice || $oldPrice < 0) {
                    $order->setDeliveryPrice($newprice);
                }

                break;

            case 2:
                return false;
        }

        return true;
    }

    public function updateCartPrice($subTotalHT)
    {
        $this->order->setSubTotalHt($subTotalHT);
        $this->order_session->persist($this->order); // Modifie la commande en session
    }


    public function setPaymentMethod($params)
    {
        $this->order->setPaymentMethod($params); // Modifie le moyen de paiement de la commande
        $this->order_session->persist($this->order); // Modifie la commande en session
    }

    public function setValidatedPayment()
    {
        $order = $this->order->getOrder();

        $order->setStatus(OrderStatus::VALIDATED_PAYMENT);

        $this->em->flush();
    }


    public function update()
    {
        $this->order_session->persist($this->order);
    }

    public function clear()
    {
        $this->order = new \Shopping\Entity\Order(); // Réinitialise la commannde
        $this->order_session->clear(); // Réinitialize la commande en session
    }


    public function getObjectOrder()
    {
        $order = $this->order->getOrder();

        if ($order->getPaymentMethod() != null) {
            $payment = $this->em->getRepository(PaymentMethod::class)->findWhere('entity.is_enabled = 1 AND entity.id = ' . $order->getPaymentMethod(), 1);
            $order->setPaymentMethod($payment);
        }

        if ($order->getDeliverymethod() != null) {
            $delivery = $this->em->getRepository(DeliveryMethod::class)->findWhere('entity.is_enabled = 1 AND entity.id = ' . $order->getDeliverymethod(), 1);
            $order->setDeliveryMethod($delivery);
        }

        return $order;
    }

    /**
     * Retourne la commande
     */
    public function getOrder()
    {
        $order = $this->order->getOrder();

        if ($order->getPaymentMethod() != null) {
            $payment = $this->em->getRepository(PaymentMethod::class)->findWhere('entity.is_enabled = 1 AND entity.id = ' . $order->getPaymentMethod(), 1);
            $order->setPaymentMethod($payment);
        }

        if ($order->getDeliverymethod() != null) {
            $delivery = $this->em->getRepository(DeliveryMethod::class)->findWhere('entity.is_enabled = 1 AND entity.id = ' . $order->getDeliverymethod(), 1);
            $order->setDeliveryMethod($delivery);
        }

        return $this->order->serialize();
    }

}
