<?php

namespace Sender\Entity;

use Core\Entity\ControllerList;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\PageTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Sender\Repository\SmsMailjetRepository")
 * @ORM\Table(name="sender_sms_mailjet")
 */
class SmsMailjet
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $account_key;

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
    public function getAccountKey()
    {
        return $this->account_key;
    }

    /**
     * @param mixed $account_key
     */
    public function setAccountKey($account_key): void
    {
        $this->account_key = $account_key;
    }

}
