<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration principale de l'application
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\ResearchConfigurationRepository")
 * @ORM\Table(name="shopping_research_configuration")
 */
class ResearchConfiguration
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Mémorise les recherches passées
     *
     * @ORM\Column(type="boolean")
     */
    private $use_cache;

    /**
     * Mémorise les recherches passées
     *
     * @ORM\Column(type="boolean")
     */
    private $use_suggest;


    /**
     * Recherche par  ""
     *
     * @ORM\Column(type="boolean")
     */
    private $by_reference;


    /**
     * Recherche par  ""
     *
     * @ORM\Column(type="boolean")
     */
    private $by_designation;

    /**
     * Recherche par  ""
     *
     * @ORM\Column(type="boolean")
     */
    private $by_url;

    /**
     * Recherche par  ""
     *
     * @ORM\Column(type="boolean")
     */
    private $by_keywords;


    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->setUseCache(true);
        $this->setUseSuggest(true);

        $this->setByDesignation(true);
        $this->setByKeywords(true);
        $this->setByReference(true);
        $this->setByUrl(true);
    }

    /**
     * @return mixed
     */
    public function getUseCache()
    {
        return $this->use_cache;
    }

    /**
     * @param mixed $use_cache
     */
    public function setUseCache($use_cache): void
    {
        $this->use_cache = $use_cache;
    }

    /**
     * @return mixed
     */
    public function getUseSuggest()
    {
        return $this->use_suggest;
    }

    /**
     * @param mixed $use_suggest
     */
    public function setUseSuggest($use_suggest): void
    {
        $this->use_suggest = $use_suggest;
    }

    /**
     * @return mixed
     */
    public function getByReference()
    {
        return $this->by_reference;
    }

    /**
     * @param mixed $by_reference
     */
    public function setByReference($by_reference): void
    {
        $this->by_reference = $by_reference;
    }

    /**
     * @return mixed
     */
    public function getByDesignation()
    {
        return $this->by_designation;
    }

    /**
     * @param mixed $by_designation
     */
    public function setByDesignation($by_designation): void
    {
        $this->by_designation = $by_designation;
    }

    /**
     * @return mixed
     */
    public function getByUrl()
    {
        return $this->by_url;
    }

    /**
     * @param mixed $by_url
     */
    public function setByUrl($by_url): void
    {
        $this->by_url = $by_url;
    }

    /**
     * @return mixed
     */
    public function getByKeywords()
    {
        return $this->by_keywords;
    }

    /**
     * @param mixed $by_keywords
     */
    public function setByKeywords($by_keywords): void
    {
        $this->by_keywords = $by_keywords;
    }




}
