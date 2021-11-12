<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="Shopping\Repository\DeliveryRuleRepository")
 * @ORM\Table(name="shopping_delivery_rule")
 */
class DeliveryRule
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }


    /**
     * @ORM\Column(type="integer")
     */
    protected $charge_type;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    protected $limit_lower;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    protected $limit_upper;

    /**
     * @ORM\Column(type="float")
     */
    protected $charge_price;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $limit_lower_or_equal;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $limit_upper_or_equal;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $free_charge_price;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

    }

    /**
     * @return mixed
     */
    public function getFreeChargePrice()
    {
        return $this->free_charge_price;
    }

    /**
     * @param mixed $free_charge_price
     */
    public function setFreeChargePrice($free_charge_price): void
    {
        $this->free_charge_price = $free_charge_price;
    }


    /**
     * @return mixed
     */
    public function getLimitLowerOrEqual()
    {
        return $this->limit_lower_or_equal;
    }

    /**
     * @param mixed $limit_lower_or_equal
     */
    public function setLimitLowerOrEqual($limit_lower_or_equal): void
    {
        $this->limit_lower_or_equal = $limit_lower_or_equal;
    }

    /**
     * @return mixed
     */
    public function getLimitUpperOrEqual()
    {
        return $this->limit_upper_or_equal;
    }

    /**
     * @param mixed $limit_upper_or_equal
     */
    public function setLimitUpperOrEqual($limit_upper_or_equal): void
    {
        $this->limit_upper_or_equal = $limit_upper_or_equal;
    }


    /**
     * @return mixed
     */
    public function getChargeType()
    {
        return $this->charge_type;
    }

    /**
     * @param mixed $charge_type
     */
    public function setChargeType($charge_type): void
    {
        $this->charge_type = $charge_type;
    }

    /**
     * @return mixed
     */
    public function getLimitLower()
    {
        return $this->limit_lower;
    }

    /**
     * @param mixed $limit_lower
     */
    public function setLimitLower($limit_lower): void
    {
        $this->limit_lower = $limit_lower;
    }

    /**
     * @return mixed
     */
    public function getLimitUpper()
    {
        return $this->limit_upper;
    }

    /**
     * @param mixed $limit_upper
     */
    public function setLimitUpper($limit_upper): void
    {
        $this->limit_upper = $limit_upper;
    }

    /**
     * @return mixed
     */
    public function getChargePrice()
    {
        return $this->charge_price;
    }

    /**
     * @param mixed $charge_price
     */
    public function setChargePrice($charge_price): void
    {
        $this->charge_price = $charge_price;
    }


    public function __toString()
    {
        $text = '';

        switch ($this->getChargeType()) {
            case 0:
                $text .= 'Prix HT';
                break;
            case 1:
                $text .= 'Poids';
                break;
            case 2:
                $text .= 'Quantité';
                break;
        }
        $text .= ' | ';

        if ($this->getLimitLower() != null && $this->getLimitLower() >= 0) {
            $text .= $this->getLimitLower() . ' <';


            if ($this->getLimitLowerOrEqual()) {
                $text .= '=';
            }
        }

        $text .= ' Valeur du panier';

        if ($this->getLimitUpper() != null && $this->getLimitUpper() >= 0) {

            $text .= ' <';
            if ($this->getLimitUpperOrEqual()) {
                $text .= '=';
            }

            $text .= ' ' .$this->getLimitUpper();
        }

        $text .= ' | ';

        if ($this->getFreeChargePrice()) {
            $text .= 'Gratuit';
        } else {
            $text .= '+ '.  $this->getChargePrice() . ' €';
        }
        return $text;
    }
}
