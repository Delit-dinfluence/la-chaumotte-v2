<?php

namespace Shopping\Entity;

use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="shopping_reduction_translation")
 */
class ReductionTranslation
{
    use TranslationTrait;

    /**
     * Désignation
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $designation;

    /**
     * Description
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

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

}