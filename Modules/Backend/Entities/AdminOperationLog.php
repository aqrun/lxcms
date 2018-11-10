<?php
namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AdminOperationLog
 * @package Modules\Backend\Entities
 *
 * @property $id
 * @property $admin_user_id
 * @property $path
 * @property $method
 * @property $ip
 * @property $input
 * @property $created_at
 * @property $updated_at
 *
 */
class AdminOperationLog extends BaseEntity
{
    protected $fillable = ['admin_user_id', 'path', 'method', 'ip', 'input'];

    public static $methodColors = [
        'GET'    => 'green',
        'POST'   => 'yellow',
        'PUT'    => 'blue',
        'DELETE' => 'red',
    ];

    public static $methods = [
        'GET', 'POST', 'PUT', 'DELETE', 'OPTIONS', 'PATCH',
        'LINK', 'UNLINK', 'COPY', 'HEAD', 'PURGE',
    ];

    /**
     * Log belongs to users.
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(AdminUser::class);
    }
}
