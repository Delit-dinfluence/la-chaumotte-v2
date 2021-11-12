<?php

namespace Core\Entity;

use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="core_text_group_translation")
 */
class TextGroupTranslation
{
    use TranslationTrait;

    /**
     * Nom du groupe de traduction
     *
     * @ORM\Column(type="string", length=255)
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
