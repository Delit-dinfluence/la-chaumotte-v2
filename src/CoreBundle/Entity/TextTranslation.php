<?php

namespace Core\Entity;

use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="core_text_translation")
 */
class TextTranslation
{
    use TranslationTrait;

    /**
     * Valeur de la traduction
     *
     * @ORM\Column(type="text")
     */
    private $value;

    /**
     * Description de la traduction visible dans l'administration
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;


    /**
     * Mot(s) clé(s) de recherche du texte dans l'administration
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $keywords;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
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

}
