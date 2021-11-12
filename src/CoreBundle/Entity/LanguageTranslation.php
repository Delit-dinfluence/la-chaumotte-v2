<?php

namespace Core\Entity;

use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="core_language_translation")
 */
class LanguageTranslation
{
    use TranslationTrait;

    /**
     * Nom de la langue
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation;

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

}
