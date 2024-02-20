<?php

namespace App\Facades;

use App\Services\MetaContentService;

class MetaContentFacade extends MetaContentService
{
    protected static function getFacadeAccessor()
    {
        return 'content';
    }
}
