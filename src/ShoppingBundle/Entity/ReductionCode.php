<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Code de réduction
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\ReductionCodeRepository")
 * @ORM\Table(name="shopping_reduction_code")
 */
class ReductionCode extends Reduction
{
    /**
     * Code
     *
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * Quantité de codes utilisables pour ce code
     *
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * Constructor
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setCode(uniqid());
        $this->setQuantity(1);
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

}