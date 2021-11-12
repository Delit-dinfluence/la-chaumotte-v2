<?php

namespace Shopping\Entity;

use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="shopping_country_translation")
 */
class CountryTranslation
{
    use TranslationTrait;

    /**
     * Nom du pays
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
