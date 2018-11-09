<?php
namespace Modules\Backend\Entities;

class Language extends BaseEntity
{
    protected $fillable = ['vid', 'name', 'script', 'native', 'regional'];
}