<?php

namespace App\Facades;

use App\Services\MetaSeoService;

class MetaSeoFacade extends MetaSeoService
{
    protected static function getFacadeAccessor()
    {
        return 'metaseo';
    }
}
