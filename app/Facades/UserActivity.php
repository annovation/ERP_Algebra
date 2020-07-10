<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class UserActivity extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'useractivity';
    }
}
