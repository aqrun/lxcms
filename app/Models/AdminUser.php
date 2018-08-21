<?php

namespace App\Models;


use Encore\Admin\Traits\AdminBuilder;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * Class AdminUser
 *
 *
 */
class AdminUser extends BaseModel implements AuthenticatableContract
{
    use Authenticatable, AdminBuilder, Traits\HasPermissions;

    protected $fillable = ['username', 'password', 'name', 'avatar'];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable(config('admin.database.users_table'));

        parent::__construct($attributes);
    }
}