<?php

namespace Shopping\Entity;

use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class CategoryTranslation
{
    use TranslationTrait;

    /**
     * Nom de la catégorie
     *
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * Description de la catégorie
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * Texte alternatif de l'image
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image_alt;

    /**
     * URL personnalisée
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImageAlt()
    {
        return $this->image_alt;
    }

    /**
     * @param mixed $image_alt
     */
    public function setImageAlt($image_alt): void
    {
        $this->image_alt = $image_alt;
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
