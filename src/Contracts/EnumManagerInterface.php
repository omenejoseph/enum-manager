<?php
namespace OmeneJoseph\EnumManager\Contracts;

interface EnumManagerInterface
{
    public function  enumValues(string  $enum_class) : string;

    public  function enumKeys(string  $enum_class) : string;

    public function enumValuesArray(string  $enum_class): array;
}