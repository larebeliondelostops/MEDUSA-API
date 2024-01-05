<?php

namespace App\DTOs\Viper;

use \ReflectionClass;

class DTO 
{
    public function __construct(array $data) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    private function snakeToCamelCase($string)
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        $str[0] = strtolower($str[0]);
        return $str;
    }

    public function toArrayLowerCase()
    {
        $array = [];
        $reflectionClass = new ReflectionClass($this);
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $camelCaseKey = $this->snakeToCamelCase($property->getName());
            $array[$camelCaseKey] = $property->getValue($this);
        }
        return $array;
    }

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