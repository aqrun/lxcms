<?php
namespace Modules\Backend\Facades;

use Illuminate\Support\Facades\Facade;

class Backend extends Facade
{

    protected static function getFacadeAccessor()
    {
        return \Modules\Backend\Backend::class;
    }

}