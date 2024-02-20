<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class NavigationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'navigation.service';
    }
}
