<?php

namespace Ecoding\DataDictionaryAPI\Facades;

use Illuminate\Support\Facades\Facade;

class DataDictionaryAPI extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'DataDictionaryAI';
    }
}
