<?php

namespace App\Entity;

use Core\Entity\Traits\PageTranslationTrait;
use Core\Entity\Traits\TranslatableTrait;
use Core\Entity\Traits\TranslationTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="app_page_home_translation")
 */
class PageHomeTranslation
{
    use TranslationTrait;
    use PageTranslationTrait;

}
