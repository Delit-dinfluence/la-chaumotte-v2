<?php

namespace App\Entity;

use Core\Entity\ControllerList;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\PageTrait;
use Core\Entity\Traits\PageTranslationTrait;
use Core\Entity\Traits\TranslatableTrait;
use Core\Entity\Traits\TranslationTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="app_page_account_info_translation")
 */
class PageAccountInfoTranslation
{
    use TranslationTrait;
    use PageTranslationTrait;

}
