<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Enumération des types de champs
 */
abstract class CheckType extends Enum
{
    const EMAIL = 1;
    const STRING = 2;
    const TEXT = 3;
    const INTEGER = 4;
    const FLOAT = 5;
    const BOOLEAN = 6;

    const ZIP_CODE = 100;
    const PHONE = 101;
    const URL = 102;
    const IP = 103;

}


class CheckValidator
{

    /**
     * Valide les différents champs en fonction de leur type (Email, String, Float, Integer, ...)
     */
    public static function validate($fields)
    {
        $isError = false;
        $errors = [];

        foreach ($fields as $key => $value) {

            $object = CheckValidator::validatePerType($value['value'], $value['type'], $key);

            // Si une erreur a été détecté
            if ($object['isError']) {
                $isError = true;
                $errors[] = $object;
            }

        }

        return [
            'isError' => $isError,
            'errors' => $errors
        ];
    }

    /**
     * Valide la conformité de la $value en fonction du CheckType $type
     */
    public static function validatePerType($value, $type, $key)
    {
        $isError = false;
        $error = '';

        if (strlen($value) <= 0) {

            $isError = true;
            $error = 'Field required';

        } else {

            switch ($type) {

                case CheckType::BOOLEAN:

                    if (!filter_var($value, FILTER_VALIDATE_BOOLEAN)) {
                        $isError = true;
                        $error = 'Invalid "Boolean"';
                    }

                    break;

                case CheckType::INTEGER:

                    if (!filter_var($value, FILTER_VALIDATE_INT)) {
                        $isError = true;
                        $error = 'Invalid "Integer"';
                    }

                    break;

                case CheckType::FLOAT:

                    if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
                        $isError = true;
                        $error = 'Invalid "Float';
                    }
                    break;

                case CheckType::EMAIL:

                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $isError = true;
                        $error = 'Invalid "E-MAIL ADRESSE"';
                    }

                    break;

                case CheckType::PHONE:

                    if (!preg_match('#^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$#', $value)) {
                        $isError = true;
                        $error = 'Invalid "PHONE NUMBER"';
                    }

                    break;

                case CheckType::ZIP_CODE:

                    $regexs = [
                        "FR" => "^(F-)?((2[A|B])|[0-9]{2})[0-9]{3}$",
                        "US" => "^\d{5}([\-]?\d{4})?$",
                        "UK" => "^(GIR|[A-Z]\d[A-Z\d]??|[A-Z]{2}\d[A-Z\d]??)[ ]??(\d[A-Z]{2})$",
                        "DE" => "\b((?:0[1-46-9]\d{3})|(?:[1-357-9]\d{4})|(?:[4][0-24-9]\d{3})|(?:[6][013-9]\d{3}))\b",
                        "CA" => "^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$",
                        "IT" => "^(V-|I-)?[0-9]{5}$",
                        "AU" => "^(0[289][0-9]{2})|([1345689][0-9]{3})|(2[0-8][0-9]{2})|(290[0-9])|(291[0-4])|(7[0-4][0-9]{2})|(7[8-9][0-9]{2})$",
                        "NL" => "^[1-9][0-9]{3}\s?([a-zA-Z]{2})?$",
                        "ES" => "^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$",
                        "DK" => "^([D-d][K-k])?( |-)?[1-9]{1}[0-9]{3}$",
                        "SE" => "^(s-|S-){0,1}[0-9]{3}\s?[0-9]{2}$",
                        "BE" => "^[1-9]{1}[0-9]{3}$"
                    ];

                    $isError = true;
                    $error = 'Invalid "ZIP CODE"';

                    foreach ($regexs as $regex) {

                        if (preg_match("/" . $regex . "/i", $value)) {
                            $isError = false;
                            $error = '';
                        }

                    }

                    break;

                case CheckType::URL:

                    if (!filter_var($value, FILTER_VALIDATE_URL)) {
                        $isError = true;
                        $error = 'Invalid "URL"';
                    }

                    break;

                case CheckType::IP:

                    if (!filter_var($value, FILTER_VALIDATE_IP)) {
                        $isError = true;
                        $error = 'Invalid "IP"';
                    }

                    break;
            }

        }

        return [
            'key' => $key,
            'value' => $value,
            'isError' => $isError,
            'error' => $error
        ];
    }

    /**
     * Nettoie la $value en fonction du CheckType $type
     */
    public static function sanitize($value, $type)
    {

        switch ($type) {


            case CheckType::STRING:

                $value = filter_var($value, FILTER_SANITIZE_STRING);

                break;

            case CheckType::TEXT:

                $value = filter_var($value, FILTER_SANITIZE_STRING);

                break;

            case CheckType::INTEGER:

                $value = (integer)filter_var($value, FILTER_SANITIZE_NUMBER_INT);

                break;

            case CheckType::FLOAT:

                $value = (float)filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);

                break;

            case CheckType::BOOLEAN:

                if ($value != false && $value != true && $value != 0 && $value != 1) {
                    $value = false;
                }

                break;


            case CheckType::EMAIL:

                $value = filter_var($value, FILTER_SANITIZE_EMAIL);

                break;

            case CheckType::ZIP_CODE:

                $value = filter_var($value, FILTER_SANITIZE_STRING);

                break;

            case CheckType::PHONE:

                $value = filter_var($value, FILTER_SANITIZE_STRING);

                break;

            case CheckType::URL:

                $value = filter_var($value, FILTER_SANITIZE_URL);

                break;

            case CheckType::IP:

                $value = filter_var($value, FILTER_SANITIZE_STRING);

                break;


        }

        return [
            'value' => $value,
            'type' => $type
        ];
    }

}
