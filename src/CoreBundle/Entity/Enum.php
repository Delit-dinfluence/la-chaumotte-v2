<?php

namespace Core\Entity;

/**
 * Enumération
 */
abstract class Enum
{
    /**
     * Tableau des valeurs de l'énumération
     */
    protected static $typeName = [];

    protected static $keyName = [];

    /**
     * Retourne la valeur associée
     * @throws \Exception
     */
    public static function getTypeName($type)
    {

        if (!isset(static::$typeName[$type])) {
            throw new \Exception('L\'index "' . $type . '" est inconnue par l\'énumération."');
        }

        return static::$typeName[$type];
    }

    public static function getKeyName($type)
    {

        if (!isset(static::$keyName[$type])) {
            throw new \Exception('L\'index "' . $type . '" est inconnue par l\'énumération."');
        }

        return static::$keyName[$type];
    }

    /**
     * Retourne toutes les valeurs
     */
    public static function getTypeNames()
    {
        return static::$typeName;
    }

}
