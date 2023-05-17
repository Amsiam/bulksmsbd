<?php

namespace Amsiam\BulkSmsBD\Facades;

use Illuminate\Support\Facades\Facade;

class BulkSmsBD extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'BulkSmsBD';
    }
}
