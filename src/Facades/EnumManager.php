<?php

namespace OmeneJoseph\EnumManager\Facades;

use Illuminate\Support\Facades\Facade;

class EnumManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'enummanager';
    }
}
