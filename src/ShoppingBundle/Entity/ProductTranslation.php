<?php

namespace Shopping\Entity;

use Core\Entity\Traits\PageTranslationTrait;
use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 * @ORM\Entity()
 * @ORM\Table(name="shopping_product_translation")
 */
class ProductTranslation
{
    use TranslationTrait;
    use PageTranslationTrait;

    /**
     * Nom du produit
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subtitle;

    /**
     * URL du produit
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * Résumé
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_short;

    /**
     * Description complète
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_long;

    /**
     * Résumé
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_research;

    /**
     * Mot(s) clé(s) de recherche
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $keywords;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $fiche;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="fiche")
     * @var File
     */
    private $ficheFile;

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     */
    public function setSubtitle($subtitle): void
    {
        $this->subtitle = $subtitle;
    }


    /**
     * @return string
     */
    public function getFiche()
    {
        return $this->fiche;
    }

    /**
     * @param string $fiche
     */
    public function setFiche($fiche)
    {
        $this->fiche = $fiche;
    }

    /**
     * @return File
     */
    public function getFicheFile()
    {
        return $this->ficheFile;
    }

    /**
     * @param File $ficheFile
     */
    public function setFicheFile($ficheFile)
    {
        $this->ficheFile = $ficheFile;

        if ($ficheFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }



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
    public function getDescriptionShort()
    {
        return $this->description_short;
    }

    /**
     * @param mixed $description_short
     */
    public function setDescriptionShort($description_short): void
    {
        $this->description_short = $description_short;
    }

    /**
     * @return mixed
     */
    public function getDescriptionLong()
    {
        return $this->description_long;
    }

    /**
     * @param mixed $description_long
     */
    public function setDescriptionLong($description_long): void
    {
        $this->description_long = $description_long;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getDescriptionResearch()
    {
        return $this->description_research;
    }

    /**
     * @param mixed $description_research
     */
    public function setDescriptionResearch($description_research): void
    {
        $this->description_research = $description_research;
    }

}
