<?php
namespace Modules\Backend\Entities;

class RbacRolesData extends BaseEntity
{
    protected $fillable = ['rbac_role_id', 'langcode', 'title'];
    protected $table = 'rbac_roles_data';
    protected $primaryKey = ['rbac_role_id','lang_code'];

    public $incrementing = false;
    public $timestamps = false;
}