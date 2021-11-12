<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moyen de livraison - Mondiale Relay
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\DeliveryMondialRelayRepository")
 * @ORM\Table(name="shopping_delivery_mondial_relay")
 */
class DeliveryMondialRelay extends Delivery
{

    /**
     * Code client
     *
     * @ORM\Column(type="string", length=255)
     */
    private $client_code;

    /**
     * Clé privée
     *
     * @ORM\Column(type="string", length=255)
     */
    private $private_key;

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
    public function getClientCode()
    {
        return $this->client_code;
    }

    /**
     * @param mixed $client_code
     */
    public function setClientCode($client_code): void
    {
        $this->client_code = $client_code;
    }

    /**
     * @return mixed
     */
    public function getPrivateKey()
    {
        return $this->private_key;
    }

    /**
     * @param mixed $private_key
     */
    public function setPrivateKey($private_key): void
    {
        $this->private_key = $private_key;
    }

}
