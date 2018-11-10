<?php

namespace Modules\Backend\Entities;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

/**
 * Class AdminUser
 *
 * @property $id
 * @property $username
 * @property $name
 * @property $email
 * @property $mobile
 * @property $weight
 * @property $status
 * @property $gender
 * @property $birthday
 * @property $avatar
 * @property $timezone
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 */
class AdminUser extends BaseEntity implements AuthenticatableContract
{

    use Authenticatable, Traits\RbacHasRoles;

    protected $fillable = ['username', 'password', 'name', 'avatar'];

    public function getAvatarAttribute()
    {
        return $this->avatar ?? config('backend.default_avatar');
    }


}
