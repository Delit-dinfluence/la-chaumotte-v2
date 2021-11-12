<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Core\Repository\MediaFileRepository")
 * @ORM\Table(name="core_media_file")
 */
class MediaFile
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $document;

    /**
     * @Vich\UploadableField(mapping="files", fileNameProperty="document")
     * @var File
     */
    private $documentFile;

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
     * @return string
     */
    public function getDocument(): ?string
    {
        return $this->document;
    }

    /**
     * @param string $document
     */
    public function setDocument(?string $document): void
    {
        $this->document = $document;
    }

    /**
     * @return string
     */
    public function getDocumentFile()
    {
        return $this->documentFile;
    }

    /**
     * @param File $item
     * @throws \Exception
     */
    public function setDocumentFile($item)
    {
        $this->documentFile = $item;

        if ($item) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

    /**
     * Retourne l'URL du fichier
     */
    public function getSlug()
    {
        return '/assets/media/files/' . $this->document;
    }

}
