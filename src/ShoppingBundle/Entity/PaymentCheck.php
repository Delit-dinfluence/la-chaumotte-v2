<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moyen de paiement - Chèque
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\PaymentCheckRepository")
 * @ORM\Table(name="shopping_payment_check")
 */
class PaymentCheck extends  Payment
{

    /**
     * Titulaire
     *
     * @ORM\Column(type="string", length=255)
     */
    private $beneficiary;

    /**
     * Banque
     *
     * @ORM\Column(type="string", length=255)
     */
    private $bank;

    /**
     * Clé RIB
     *
     * @ORM\Column(type="string", length=255)
     */
    private $rib_key;

    /**
     * Numéro de compte
     *
     * @ORM\Column(type="string", length=255)
     */
    private $account_number;

    /**
     * Code guichet
     *
     * @ORM\Column(type="string", length=255)
     */
    private $branch_code;

    /**
     * Code banque
     *
     * @ORM\Column(type="string", length=255)
     */
    private $bank_code;

    /**
     * IBAN
     *
     * @ORM\Column(type="string", length=255)
     */
    private $iban;

    /**
     * BIC
     *
     * @ORM\Column(type="string", length=255)
     */
    private $bic;

    /**
     * Autres informations
     *
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    private $other;

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
    public function getBeneficiary()
    {
        return $this->beneficiary;
    }

    /**
     * @param mixed $beneficiary
     */
    public function setBeneficiary($beneficiary): void
    {
        $this->beneficiary = $beneficiary;
    }

    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param mixed $bank
     */
    public function setBank($bank): void
    {
        $this->bank = $bank;
    }

    /**
     * @return mixed
     */
    public function getRibKey()
    {
        return $this->rib_key;
    }

    /**
     * @param mixed $rib_key
     */
    public function setRibKey($rib_key): void
    {
        $this->rib_key = $rib_key;
    }

    /**
     * @return mixed
     */
    public function getAccountNumber()
    {
        return $this->account_number;
    }

    /**
     * @param mixed $account_number
     */
    public function setAccountNumber($account_number): void
    {
        $this->account_number = $account_number;
    }

    /**
     * @return mixed
     */
    public function getBranchCode()
    {
        return $this->branch_code;
    }

    /**
     * @param mixed $branch_code
     */
    public function setBranchCode($branch_code): void
    {
        $this->branch_code = $branch_code;
    }

    /**
     * @return mixed
     */
    public function getBankCode()
    {
        return $this->bank_code;
    }

    /**
     * @param mixed $bank_code
     */
    public function setBankCode($bank_code): void
    {
        $this->bank_code = $bank_code;
    }

    /**
     * @return mixed
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param mixed $iban
     */
    public function setIban($iban): void
    {
        $this->iban = $iban;
    }

    /**
     * @return mixed
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param mixed $bic
     */
    public function setBic($bic): void
    {
        $this->bic = $bic;
    }

    /**
     * @return mixed
     */
    public function getOther()
    {
        return $this->other;
    }

    /**
     * @param mixed $other
     */
    public function setOther($other): void
    {
        $this->other = $other;
    }

}
