<?php

namespace App\Entity;

use Core\Entity\ControllerList;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\PageTrait;
use Core\Entity\Traits\PageTranslationTrait;
use Core\Entity\Traits\TranslatableTrait;
use Core\Entity\Traits\TranslationTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="app_slide_translation")
 */
class SlideTranslation
{
    use TranslationTrait;
    use PageTranslationTrait;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $designation;

    /**
     * Texte alternatif de l'image
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image_alt;

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
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

}
