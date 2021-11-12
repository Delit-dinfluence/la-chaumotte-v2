<?php

namespace Core\Entity\Traits;

use Knp\DoctrineBehaviors\Model\Translatable\Translation;

trait TranslationTrait
{
    use Translation;


    /**
     * @ORM\Column(type="string", length=7)
     */
    protected $locale;

    /**
     * @inheritdoc
     */
    public static function getTranslatableEntityClass()
    {
        $explodedNamespace = explode('\\', __CLASS__);
        $entityClass = array_pop($explodedNamespace);
        return  '\\'.implode('\\', $explodedNamespace).'\\'.substr($entityClass, 0, -11);
    }

    public function __toString()
    {
        return (String)$this->getId();
    }
}