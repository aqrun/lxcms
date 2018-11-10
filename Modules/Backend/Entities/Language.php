<?php
namespace Modules\Backend\Entities;

/**
 * Class Language
 * @package Modules\Backend\Entities
 *
 * @property $id
 * @property $langcode
 * @property $name
 * @property $script
 * @property $native
 * @property $regional
 * @property $created_at
 * @property $updated_at
 *
 */
class Language extends BaseEntity
{
    protected $fillable = ['vid', 'name', 'script', 'native', 'regional'];
}