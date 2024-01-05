<?php

namespace App\DTOs\Viper;

use \ReflectionClass;

class DTO 
{
    public function toArray()
    {
        $array = [];
        $reflectionClass = new ReflectionClass($this);
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($this);
        }
        return $array;
    }
}