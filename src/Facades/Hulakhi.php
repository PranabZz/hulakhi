<?php

namespace Hulakhi\Facades;

use Illuminate\Support\Facades\Facade;

class Hulakhi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'hulakhi';
    }
}
