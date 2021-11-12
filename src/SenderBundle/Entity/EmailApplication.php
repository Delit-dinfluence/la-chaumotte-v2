<?php

namespace Sender\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Sender\Repository\EmailApplicationRepository")
 * @ORM\Table(name="sender_email_application")
 */
class EmailApplication
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dev_key;

    /**
     * @ORM\ManyToOne(targetEntity="Email", inversedBy="applications")
     * @ORM\JoinColumn(name="email", referencedColumnName="id", nullable=true)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="EmailTemplate", inversedBy="applications")
     * @ORM\JoinColumn(name="template", referencedColumnName="id", nullable=true)
     */
    private $template;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subject;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sender;

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
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getDevKey()
    {
        return $this->dev_key;
    }

    /**
     * @param mixed $dev_key
     */
    public function setDevKey($dev_key): void
    {
        $this->dev_key = $dev_key;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender): void
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     */
    public function setTemplate($template): void
    {
        $this->template = $template;
    }

}
