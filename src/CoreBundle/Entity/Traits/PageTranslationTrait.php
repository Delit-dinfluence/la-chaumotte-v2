<?php

namespace Core\Entity\Traits;

trait PageTranslationTrait
{
    /**
     * Nom de la page
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation;

    /**
     * URL de la page
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uri;

    /**
     * Balise Meta-title
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $seo_title;

    /**
     * Balise meta-description
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $seo_description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $seo_keywords;

    /**
     * Balise meta-title des réseaux sociaux
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sn_title;

    /**
     * Balise meta-description des réseaux sociaux
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sn_description;

    /**
     * Constructeur
     *
     * PageTranslationTrait constructor.
     */
    public function __construct()
    {
        $this->setSeoTitle('');
        $this->setSeoDescription('');
        $this->setSeoKeywords('');
        $this->setSnTitle('');
        $this->setSnDescription('');
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
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     */
    public function setUri($uri): void
    {
        $this->uri = $uri;
    }

    /**
     * @return mixed
     */
    public function getSeoTitle()
    {
        return $this->seo_title;
    }

    /**
     * @param mixed $seo_title
     */
    public function setSeoTitle($seo_title)
    {
        $this->seo_title = $seo_title;
    }

    /**
     * @return mixed
     */
    public function getSeoDescription()
    {
        return $this->seo_description;
    }

    /**
     * @param mixed $seo_description
     */
    public function setSeoDescription($seo_description)
    {
        $this->seo_description = $seo_description;
    }

    /**
     * @return mixed
     */
    public function getSeoKeywords()
    {
        return $this->seo_keywords;
    }

    /**
     * @param mixed $seo_keywords
     */
    public function setSeoKeywords($seo_keywords)
    {
        $this->seo_keywords = $seo_keywords;
    }

    /**
     * @return mixed
     */
    public function getSnTitle()
    {
        return $this->sn_title;
    }

    /**
     * @param mixed $sn_title
     */
    public function setSnTitle($sn_title)
    {
        $this->sn_title = $sn_title;
    }

    /**
     * @return mixed
     */
    public function getSnDescription()
    {
        return $this->sn_description;
    }

    /**
     * @param mixed $sn_description
     */
    public function setSnDescription($sn_description)
    {
        $this->sn_description = $sn_description;
    }

}
