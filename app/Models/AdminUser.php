<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

/**
 * Class AdminUser
 *
 *
 */
class AdminUser extends BaseModel implements AuthenticatableContract
{

    use Authenticatable, Traits\RbacHasRoles;

    protected $fillable = ['username', 'password', 'name', 'avatar'];

    public function getAvatarAttribute()
    {
        return $this->avatar ?? config('backend.default_avatar');
    }


}
