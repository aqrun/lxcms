<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class AdminUser
 *
 *
 */
class AdminUser extends Authenticatable
{

    protected $fillable = ['username', 'password', 'name', 'avatar'];

    public function getAvatarAttribute()
    {
        return $this->avatar ?? config('backend.default_avatar');
    }

}