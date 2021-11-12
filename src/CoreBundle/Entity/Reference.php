<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Documentation de l'espace d'administration
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Core\Repository\ReferenceRepository")
 * @ORM\Table(name="core_reference")
 */
class Reference
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Référence unique de la catégorie
     *
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * Image de la catégorie
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
     * Référence unique de la catégorie
     *
     * @ORM\Column(type="boolean")
     */
    private $use_url;

    /**
     * Référence unique de la catégorie
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
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
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUseUrl()
    {
        return $this->use_url;
    }

    /**
     * @param mixed $use_url
     */
    public function setUseUrl($use_url): void
    {
        $this->use_url = $use_url;
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
