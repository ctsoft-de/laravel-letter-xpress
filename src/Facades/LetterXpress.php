<?php

namespace CTSoft\Laravel\LetterXpress\Facades;

use CTSoft\Laravel\LetterXpress\Client;
use Illuminate\Support\Facades\Facade;

class LetterXpress extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Client::class;
    }
}
