<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="core_media_file_translation")
 */
class MediaFileTranslation
{
    use TranslationTrait;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $document_alt;

    /**
     * @return string
     */
    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     */
    public function setDesignation(?string $designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @return string
     */
    public function getDocumentAlt(): ?string
    {
        return $this->document_alt;
    }

    /**
     * @param string $document_alt
     */
    public function setDocumentAlt(?string $document_alt): void
    {
        $this->document_alt = $document_alt;
    }

}
