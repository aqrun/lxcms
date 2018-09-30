<?php
namespace Modules\Backend\Models;

abstract class BaseModel
{
    public function __construct()
    {
        $this->init();
    }

    public function init(){}
}
