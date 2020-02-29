<?php

namespace OmeneJoseph\EnumManager;

use OmeneJoseph\EnumManager\Contracts\EnumManagerInterface;

class EnumManager implements EnumManagerInterface
{
    private function  getProperties() : array
    {
        $reflection = new \ReflectionClass($this);
        return $reflection->getConstants();
    }

    public function  enumValues(string $enum_class) : string
    {
        $properties = new $enum_class;
        return implode(',', array_values($properties->getProperties()));
    }

    public function enumKeys(string $enum_class) : string
    {
        $properties = new $enum_class;
        return implode(',', array_keys($properties->getProperties()));
    }

    public function enumValuesArray(string $enum_class) : array
    {
        $properties = new $enum_class;
        return array_values($properties->getProperties());
    }

    public function enumKeysArray(string $enum_class) : array
    {
        $properties = new $enum_class;
        return array_keys($properties->getProperties());
    }
}