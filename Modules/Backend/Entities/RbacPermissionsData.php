<?php
namespace Modules\Backend\Entities;

class RbacPermissionsData extends BaseEntity
{
    protected $fillable = ['rbac_permission_id', 'langcode', 'title'];
    protected $table = 'rbac_permissions_data';
    protected $primaryKey = ['rbac_permission_id','lang_code'];

    public  $incrementing = false;
    public $timestamps = false;
}