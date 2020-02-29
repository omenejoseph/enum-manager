<?php
namespace OmeneJoseph\EnumManager\Services;
use OmeneJoseph\EnumManager\Contracts\EnumManagerInterface;

class EnumManagerService implements EnumManagerInterface
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

    public function enumKeyArray(string $enum_class) : array
    {
        $properties = new $enum_class;
        return array_keys($properties->getProperties());
    }
}