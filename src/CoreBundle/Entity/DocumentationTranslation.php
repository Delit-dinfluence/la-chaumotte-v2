<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTranslationTrait;
use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="core_documentation_translation")
 */
class DocumentationTranslation
{
    use TranslationTrait;

    /**
     * Titre de l'onglet de documentation
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * Contenu de l'onglet de documentation
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

}
