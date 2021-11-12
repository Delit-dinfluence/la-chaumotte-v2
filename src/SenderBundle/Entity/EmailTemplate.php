<?php

namespace Sender\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Sender\Repository\EmailTemplateRepository")
 * @ORM\Table(name="sender_email_template")
 */
class EmailTemplate
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity="EmailApplication", mappedBy="email", cascade={"persist"})
     */
    private $applications;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->applications = new ArrayCollection();
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     *
     * @return ArrayCollection
     */
    public function getApplications()
    {
        return $this->applications;
    }

    /**
     *
     * @param EmailApplication $item
     */
    public function addApplication(EmailApplication $item)
    {
        $this->applications[] = $item;
        $item->setEmail($this);
    }

    public function __toString()
    {
        return (string)$this->getReference();
    }

}
