<?php

namespace App\Entity;

use Core\Entity\ControllerList;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\PageTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\SlideRepository")
 * @ORM\Table(name="app_slide")
 */
class Slide
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }
    use PageTrait {
        PageTrait::__construct as private __pageConstruct;
    }

    /**
     * Référence unique de la catégorie
     *
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="integer")
     */
    private $slide_type;

    /**
     * Parent de la catégorie
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Page", inversedBy="slides")
     * @ORM\JoinColumn(name="page", referencedColumnName="id", nullable=true)
     */
    private $page;

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
     * @ORM\Column(type="boolean")
     */
    private $use_logo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $use_url;

    /**
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
        $this->__pageConstruct();

        $this->setIsIndexable(true);
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
     * @return mixed
     */
    public function getUseLogo()
    {
        return $this->use_logo;
    }

    /**
     * @param mixed $use_logo
     */
    public function setUseLogo($use_logo): void
    {
        $this->use_logo = $use_logo;
    }

    /**
     * @return mixed
     */
    public function getSlideType()
    {
        return $this->slide_type;
    }

    /**
     * @param mixed $slide_type
     */
    public function setSlideType($slide_type): void
    {
        $this->slide_type = $slide_type;
    }


    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
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


}
