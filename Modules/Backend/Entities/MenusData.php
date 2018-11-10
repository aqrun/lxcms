<?php
namespace Modules\Backend\Entities;

/**
 * Class MenusData
 * @package Modules\Backend\Entities
 *
 * @property $menu_id
 * @property $langcode
 * @property
 *
 *
 */
class MenusData extends BaseEntity
{
    protected $fillable = ['menu_id', 'langcode', 'title'];
    protected $table = 'menus_data';
    protected $primaryKey = ['menu_id','lang_code'];

    public  $incrementing = false;
    public $timestamps = false;
}