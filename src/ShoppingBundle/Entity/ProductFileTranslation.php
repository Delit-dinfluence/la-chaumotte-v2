<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Core\Entity\Traits\TranslationTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="shopping_product_file_translation")
 */
class ProductFileTranslation
{
    use TranslationTrait;


}
