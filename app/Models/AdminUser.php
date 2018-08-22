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

}