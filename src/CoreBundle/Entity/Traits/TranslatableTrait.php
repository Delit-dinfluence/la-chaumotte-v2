<?php

namespace Core\Entity\Traits;

use Knp\DoctrineBehaviors\Model\Translatable\Translatable;

trait TranslatableTrait
{
    use Translatable;

    public function __call($method, $arguments)
    {
        $method = ('get' === substr($method, 0, 3) || 'set' === substr($method, 0, 3)) ? $method : 'get' . ucfirst($method);
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }

    public function __get($name)
    {
        $method = 'get' . str_replace(' ', '', ucwords(str_replace("_", " ", $name)));
        $arguments = [];
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }

    public function __set($name, $value)
    {
        $method = 'set' . str_replace(' ', '', ucwords(str_replace("_", " ", $name)));
        return $this->proxyCurrentLocaleTranslation($method, [$value]);
    }

    public static function getTranslationEntityClass()
    {
        $explodedNamespace = explode('\\', __CLASS__);
        $entityClass = array_pop($explodedNamespace);
        return '\\' . implode('\\', $explodedNamespace) . '\\' . $entityClass . 'Translation';
    }

}
