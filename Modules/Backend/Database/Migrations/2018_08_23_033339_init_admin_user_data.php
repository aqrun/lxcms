<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Backend\Entities\AdminUser;
use Modules\Backend\Entities\RbacRole;
use Modules\Backend\Entities\RbacPermission;
use Modules\Backend\Entities\Menu;

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
        $admin->email = 'administrator@qq.com';
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
                'langcode'  => 'en',
                'icon'      => 'fa-bar-chart',
                'uri'       => '/dashboard',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => '面版',
                'langcode'  => 'zh',
                'icon'      => 'fa-bar-chart',
                'uri'       => '/dashboard',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => 'Admin',
                'langcode'  => 'en',
                'icon'      => 'fa-tasks',
                'uri'       => '',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => '后台',
                'langcode'  => 'zh',
                'icon'      => 'fa-tasks',
                'uri'       => '',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 3,
                'title'     => 'Users',
                'langcode'  => 'en',
                'icon'      => 'fa-users',
                'uri'       => '/admin-users',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 3,
                'title'     => '管理员',
                'langcode'  => 'zh',
                'icon'      => 'fa-users',
                'uri'       => '/admin-users',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 4,
                'title'     => 'Roles',
                'langcode'  => 'en',
                'icon'      => 'fa-user',
                'uri'       => '/rbac-roles',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 4,
                'title'     => '角色',
                'langcode'  => 'zh',
                'icon'      => 'fa-user',
                'uri'       => '/rbac-roles',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 5,
                'title'     => 'Permission',
                'langcode'  => 'en',
                'icon'      => 'fa-ban',
                'uri'       => '/rbac-permissions',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 5,
                'title'     => '权限',
                'langcode'  => 'zh',
                'icon'      => 'fa-ban',
                'uri'       => '/rbac-permissions',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 6,
                'title'     => 'Menu',
                'langcode'  => 'en',
                'icon'      => 'fa-bars',
                'uri'       => '/menus',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 6,
                'title'     => '菜单',
                'langcode'  => 'zh',
                'icon'      => 'fa-bars',
                'uri'       => '/menus',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 7,
                'title'     => 'Operation log',
                'langcode'  => 'en',
                'icon'      => 'fa-history',
                'uri'       => '/admin-operation-logs',
                'guard_name' => $guard_name,
            ],
            [
                'parent_id' => 2,
                'order'     => 7,
                'title'     => '操作日志',
                'langcode'  => 'zh',
                'icon'      => 'fa-history',
                'uri'       => '/admin-operation-logs',
                'guard_name' => $guard_name,
            ],
        ]);

        // add role to menu.
        Menu::find(2)->roles()->save(RbacRole::first());
    }
}
