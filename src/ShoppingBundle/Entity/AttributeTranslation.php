<?php

namespace Shopping\Entity;

use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class AttributeTranslation
{
    use TranslationTrait;

    /**
     * Nom de l'attribut
     *
     * @ORM\Column(type="string", length=255)
     */
    private $designation;



    /**
     * Nom de l'attribut
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

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
