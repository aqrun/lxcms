<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\AdminUser;
use App\Models\RbacRole;
use App\Models\RbacPermission;
use App\Models\Menu;

class InitAdminUserData extends Migration
{
    const ADMIN_GUARD = 'admin_guard';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createdAdmin();
        $this->createRole();
        $this->createPermission();
        $this->createMenus();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

    protected function createdAdmin(){
        $admin = new AdminUser;
        $admin->username='administrator';
        $admin->password = bcrypt('123456');
        $admin->name = 'Administrator';
        $admin->remember_token = 'HuT8qIIscz';
        $admin->created_at = date('Y-m-d H:i:s');
        $admin->updated_at = date('Y-m-d H:i:s');
        $admin->save();
    }

    protected function createRole(){
        // create a role.
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        RbacRole::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $time = date('Y-m-d H:i:s');
        RbacRole::insert([
            ['name' => 'Administrator', 'slug' => 'administrator', 'guard_name' => self::ADMIN_GUARD,
               'created_at' => $time, 'updated_at' => $time ],
            ['name' => 'Admin', 'slug' => 'admin', 'guard_name' => self::ADMIN_GUARD,
                'created_at' => $time, 'updated_at' => $time ],
            ['name' => 'Article Manager', 'slug' => 'article_manager', 'guard_name' => self::ADMIN_GUARD,
                'created_at' => $time, 'updated_at' => $time ],
        ]);

        // add role to user.
        AdminUser::first()->assignRole(RbacRole::first()->slug);
    }

    protected function createPermission(){
        //create a permission
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        RbacPermission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $time = date('Y-m-d H:i:s');
        RbacPermission::insert([
            [
                'name'        => 'All permission',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
                'guard_name'  => self::ADMIN_GUARD,
                'created_at' => $time, 'updated_at' => $time
            ],
            [
                'name'        => 'Dashboard',
                'slug'        => 'dashboard',
                'http_method' => 'GET',
                'http_path'   => '/',
                'guard_name'  => self::ADMIN_GUARD,
                'created_at' => $time, 'updated_at' => $time
            ],
            [
                'name'        => 'Login',
                'slug'        => 'auth.login',
                'http_method' => '',
                'http_path'   => "/auth/login\r\n/auth/logout",
                'guard_name'  => self::ADMIN_GUARD,
                'created_at' => $time, 'updated_at' => $time
            ],
            [
                'name'        => 'User setting',
                'slug'        => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path'   => '/auth/setting',
                'guard_name'  => self::ADMIN_GUARD,
                'created_at' => $time, 'updated_at' => $time
            ],
            [
                'name'        => 'Auth management',
                'slug'        => 'auth.management',
                'http_method' => '',
                'http_path'   => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
                'guard_name'  => self::ADMIN_GUARD,
                'created_at' => $time, 'updated_at' => $time
            ],
        ]);

        RbacRole::first()->givePermissionTo(RbacPermission::first()->slug);
    }

    protected function createMenus(){
        $guard_name = config('backend.guard_name');
        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => 'Dashboard',
                'icon'      => 'fa-bar-chart',
                'uri'       => '/dashboard',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => 'Admin',
                'icon'      => 'fa-tasks',
                'uri'       => '',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 3,
                'title'     => 'Users',
                'icon'      => 'fa-users',
                'uri'       => '/admin/users',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 4,
                'title'     => 'Roles',
                'icon'      => 'fa-user',
                'uri'       => '/admin/roles',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 5,
                'title'     => 'Permission',
                'icon'      => 'fa-ban',
                'uri'       => '/admin/permissions',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 6,
                'title'     => 'Menu',
                'icon'      => 'fa-bars',
                'uri'       => '/admin/menu',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 7,
                'title'     => 'Operation log',
                'icon'      => 'fa-history',
                'uri'       => '/admin/logs',
                'guard_name' => $guard_name,
            ],
        ]);

        // add role to menu.
        Menu::find(2)->roles()->save(RbacRole::first());
    }
}
