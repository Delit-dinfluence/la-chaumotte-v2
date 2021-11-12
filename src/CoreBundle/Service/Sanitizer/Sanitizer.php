<?php

namespace Core\Service\Sanitizer;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class Sanitizer
{
    public function __construct(ParameterBagInterface $params)
    {

    }

    public function string($str)
    {
        return $str;
    }

    public function uri($str)
    {
        return $str;
    }

    public function boolean($str)
    {
        return $str;
    }

    public function integer($str)
    {
        return $str;
    }
}
