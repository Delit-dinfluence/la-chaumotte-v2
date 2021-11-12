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
 * @ORM\Table(name="app_actualite_translation")
 */
class ActualiteTranslation
{
    use TranslationTrait;
    use PageTranslationTrait;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $designation;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private $description_short;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private $description_long;

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

    /**
     * @return string
     */
    public function getDescriptionShort()
    {
        return $this->description_short;
    }

    /**
     * @param string $description_short
     */
    public function setDescriptionShort($description_short)
    {
        $this->description_short = $description_short;
    }

    /**
     * @return string
     */
    public function getDescriptionLong()
    {
        return $this->description_long;
    }

    /**
     * @param string $description_long
     */
    public function setDescriptionLong($description_long)
    {
        $this->description_long = $description_long;
    }

}
