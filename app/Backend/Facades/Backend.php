<?php
namespace App\Backend\Facades;

use Illuminate\Support\Facades\Facade;

class Backend extends Facade
{

    protected static function getFacadeAccessor()
    {
        return \App\Backend\Backend::class;
    }

}