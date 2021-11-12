<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Langues disponibles de l'application
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Core\Repository\LanguageRepository")
 * @ORM\Table(name="core_language")
 */
class Language
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Code de langue
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $language_code;

    /**
     * Code ISO
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $iso_code;

    /**
     * Petit format de date
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date_format;

    /**
     * Format complet de date
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date_format_full;

    /**
     * Image du drapeau
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

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
    public function getLanguageCode()
    {
        return $this->language_code;
    }

    /**
     * @param mixed $language_code
     */
    public function setLanguageCode($language_code): void
    {
        $this->language_code = $language_code;
    }

    /**
     * @return mixed
     */
    public function getIsoCode()
    {
        return $this->iso_code;
    }

    /**
     * @param mixed $iso_code
     */
    public function setIsoCode($iso_code): void
    {
        $this->iso_code = $iso_code;
    }

    /**
     * @return mixed
     */
    public function getDateFormat()
    {
        return $this->date_format;
    }

    /**
     * @param mixed $date_format
     */
    public function setDateFormat($date_format): void
    {
        $this->date_format = $date_format;
    }

    /**
     * @return mixed
     */
    public function getDateFormatFull()
    {
        return $this->date_format_full;
    }

    /**
     * @param mixed $date_format_full
     */
    public function setDateFormatFull($date_format_full): void
    {
        $this->date_format_full = $date_format_full;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(?string $image)
    {
        $this->image = $image;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     * @throws \Exception
     */
    public function setImageFile(File $imageFile)
    {
        $this->imageFile = $imageFile;

        if ($imageFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

}
