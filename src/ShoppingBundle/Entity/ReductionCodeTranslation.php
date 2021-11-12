<?php

namespace Shopping\Entity;

use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="shopping_reduction_code_translation")
 */
class ReductionCodeTranslation extends ReductionTranslation
{

}