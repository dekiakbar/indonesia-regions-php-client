<?php

namespace Dekiakbar\IndonesiaRegionsPhpClient\Adapter\Laravel;

use Illuminate\Support\Facades\Facade;

class RegionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'region';
    }
}
