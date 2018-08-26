<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Backend extends Facade
{

    protected static function getFacadeAccessor()
    {
        return \App\Helpers\Backend::class;
    }

}