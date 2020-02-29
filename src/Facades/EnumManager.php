<?php

namespace OmeneJoseph\EnumManager\Facades;

use Illuminate\Support\Facades\Facade;
use OmeneJoseph\EnumManager\Contracts\EnumManagerInterface;

class EnumManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return EnumManagerInterface::class;
    }
}
