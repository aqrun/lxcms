<?php
namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Menu extends BaseEntity
{

    use Traits\ModelTree {
        Traits\ModelTree::boot as treeBoot;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'order', 'name', 'icon', 'uri', 'guard_name'];

    /**
     * A Menu belongs to many roles.
     *
     * @return BelongsToMany
     */
    public function roles() : BelongsToMany
    {
        $pivotTable = config('permission.table_names.role_has_menus');

        return $this->belongsToMany(RbacRole::class, $pivotTable, 'menu_id', 'rbac_role_id');
    }

    public function menusData()
    {

    }

    /**
     * @return array
     */
    public function allNodes($guardName) : array
    {
        $lang = \LaravelLocalization::getCurrentLocale();

        $connection = config('database.default');
        $orderColumn = DB::connection($connection)->getQueryGrammar()->wrap($this->orderColumn);

        $byOrder = $orderColumn.' = 0,'.$orderColumn;

        $data = static::with('roles')
            ->leftJoin('menus_data', 'menus_data.menu_id', '=', 'menus.id')
            ->where('menus_data.langcode', $lang)
            ->orderByRaw($byOrder)->get()->toArray();
//        \Debugbar::info($data);
        return $data;
    }

    /**
     * Detach models from the relationship.
     *
     * @return void
     */
    protected static function boot()
    {
        static::treeBoot();

        static::deleting(function ($model) {
            $model->roles()->detach();
        });
    }
}
