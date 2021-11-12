<?php

namespace Core\Entity;

use Core\Entity\ControllerList;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\ImageTrait;
use Core\Entity\Traits\PageTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Type de fichier autorisé au téléchargement
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Core\Repository\FileFormatRepository")
 * @ORM\Table(name="core_file_format")
 */
class FileFormat
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * MIME Type de fichier
     *
     * @ORM\Column(type="string", length=255)
     */
    private $value;

    /**
     * Extension du fichier
     *
     * @ORM\Column(type="string", length=255)
     */
    private $extension;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->setReference(uniqid());
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param mixed $extension
     */
    public function setExtension($extension): void
    {
        $this->extension = $extension;
    }


    public function __toString()
    {
        return $this->getReference();
    }
}
