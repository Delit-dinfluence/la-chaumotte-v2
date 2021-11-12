<?php

namespace Shopping\Entity;

use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="shopping_attribute_group_translation")
 */
class AttributeGroupTranslation
{
    use TranslationTrait;

    /**
     * Nom du groupe d'attributs
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation;

    /**
     * Nom de l'attribut
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $label;
    
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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label): void
    {
        $this->label = $label;
    }

}
