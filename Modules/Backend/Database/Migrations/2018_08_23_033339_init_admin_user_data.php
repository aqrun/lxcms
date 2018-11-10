<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Backend\Entities\AdminUser;
use Modules\Backend\Entities\RbacRole;
use Modules\Backend\Entities\RbacPermission;
use Modules\Backend\Entities\Menu;
use Modules\Backend\Entities\Language;
use \Modules\Backend\Entities\MenusData;
use Modules\Backend\Entities\RbacRolesData;
use Modules\Backend\Entities\RbacPermissionsData;

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
        $this->addLanguages();
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

    protected function addLanguages()
    {
        $data = [
            ['langcode'=>'en','name' => 'English',                'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
            ['langcode'=>'zh','name' => 'Chinese (Simplified)',   'script' => 'Hans', 'native' => '简体中文', 'regional' => 'zh_CN'],
        ];
        Language::insert($data);
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
        RbacRolesData::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $time = date('Y-m-d H:i:s');
        $roleData = [
            ['name' => 'Administrator', 'slug' => 'administrator', 'guard_name' => self::ADMIN_GUARD,
                'created_at' => $time, 'updated_at' => $time,
                'data' => [
                    ['langcode'=>'en', 'title'=>'Administrator'],
                    ['langcode'=>'zh', 'title'=>'超级管理员'],
                ],
            ],
            ['name' => 'Admin', 'slug' => 'admin', 'guard_name' => self::ADMIN_GUARD,
                'created_at' => $time, 'updated_at' => $time,
                'data' => [
                    ['langcode'=>'en', 'title'=>'Admin'],
                    ['langcode'=>'zh', 'title'=>'管理员'],
                ],
            ],
            ['name' => 'Article Manager', 'slug' => 'article_manager', 'guard_name' => self::ADMIN_GUARD,
                'created_at' => $time, 'updated_at' => $time,
                'data' => [
                    ['langcode'=>'en', 'title'=>'Article Manager'],
                    ['langcode'=>'zh', 'title'=>'内容管理'],
                ],
            ],
        ];
        foreach($roleData as $v){
            $role = new RbacRole();
            $role->name = $v['name'];
            $role->slug = $v['slug'];
            $role->guard_name = $v['guard_name'];
            if($role->save()){
                foreach($v['data'] as $m){
                    $m['rbac_role_id'] = $role->id;
                    RbacRolesData::insert($m);
                }
            }
        }

        // add role to user.
        AdminUser::first()->assignRole(RbacRole::first()->slug);
    }

    protected function createPermission(){
        //create a permission
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        RbacPermission::truncate();
        RbacPermissionsData::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $time = date('Y-m-d H:i:s');

        $dataArr = [
            [
                'name'        => 'All permission',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
                'guard_name'  => self::ADMIN_GUARD,
                'data' => [
                    ['langcode'=>'en', 'title'=> 'All permission'],
                    ['langcode'=>'zh', 'title'=> '所有权限'],
                ],
            ],
            [
                'name'        => 'Dashboard',
                'slug'        => 'dashboard',
                'http_method' => 'GET',
                'http_path'   => '/',
                'guard_name'  => self::ADMIN_GUARD,
                'data' => [
                    ['langcode'=>'en', 'title'=> 'Dashboard'],
                    ['langcode'=>'zh', 'title'=> '面板'],
                ],
            ],
            [
                'name'        => 'Login',
                'slug'        => 'auth.login',
                'http_method' => '',
                'http_path'   => "/auth/login\r\n/auth/logout",
                'guard_name'  => self::ADMIN_GUARD,
                'data' => [
                    ['langcode'=>'en', 'title'=> 'Login'],
                    ['langcode'=>'zh', 'title'=> '登录'],
                ],
            ],
            [
                'name'        => 'User setting',
                'slug'        => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path'   => '/auth/setting',
                'guard_name'  => self::ADMIN_GUARD,
                'data' => [
                    ['langcode'=>'en', 'title'=> 'User setting'],
                    ['langcode'=>'zh', 'title'=> '用户设置'],
                ],
            ],
            [
                'name'        => 'Auth management',
                'slug'        => 'auth.management',
                'http_method' => '',
                'http_path'   => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
                'guard_name'  => self::ADMIN_GUARD,
                'data' => [
                    ['langcode'=>'en', 'title'=> 'Auth management'],
                    ['langcode'=>'zh', 'title'=> '权限管理'],
                ],
            ],
        ];
        foreach($dataArr as $v){
            $pm = new RbacPermission();
            $pm->name = $v['name'];
            $pm->slug = $v['slug'];
            $pm->http_method = $v['http_method'];
            $pm->http_path = $v['http_path'];
            $pm->guard_name = $v['guard_name'];
            if($pm->save()){
                foreach($v['data'] as $m){
                    $m['rbac_permission_id'] = $pm->id;
                    RbacPermissionsData::insert($m);
                }
            }
        }

        RbacRole::first()->givePermissionTo(RbacPermission::first()->slug);
    }

    protected function createMenus(){
        $guard_name = config('backend.guard_name');
        // add default menus.

        $menusData = [
            [
                'parent_id' => 0,
                'order'     => 1,
                'name'     => 'Dashboard',
                'icon'      => 'fa-bar-chart',
                'uri'       => '/dashboard',
                'guard_name' => $guard_name,
                'data' => [['langcode'=>'en', 'title'=>'Dashboard'], ['langcode'=>'zh', 'title'=>'面板'],],
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'name'     => 'Admin',
                'icon'      => 'fa-tasks',
                'uri'       => '',
                'guard_name' => $guard_name,
                'data' => [['langcode'=>'en', 'title'=>'Admin'], ['langcode'=>'zh', 'title'=>'后台'],],
            ],
            [
                'parent_id' => 2,
                'order'     => 3,
                'name'     => 'Users',
                'icon'      => 'fa-users',
                'uri'       => '/admin-users',
                'guard_name' => $guard_name,
                'data' => [['langcode'=>'en', 'title'=>'Users'], ['langcode'=>'zh', 'title'=>'管理员'],],
            ],
            [
                'parent_id' => 2,
                'order'     => 4,
                'name'     => 'Roles',
                'icon'      => 'fa-user',
                'uri'       => '/rbac-roles',
                'guard_name' => $guard_name,
                'data' => [['langcode'=>'en', 'title'=>'Roles'], ['langcode'=>'zh', 'title'=>'角色'],],
            ],
            [
                'parent_id' => 2,
                'order'     => 5,
                'name'     => 'Permission',
                'icon'      => 'fa-ban',
                'uri'       => '/rbac-permissions',
                'guard_name' => $guard_name,
                'data' => [['langcode'=>'en', 'title'=>'Permission'], ['langcode'=>'zh', 'title'=>'权限'],],
            ],
            [
                'parent_id' => 2,
                'order'     => 6,
                'name'     => 'Menu',
                'icon'      => 'fa-bars',
                'uri'       => '/menus',
                'guard_name' => $guard_name,
                'data' => [['langcode'=>'en', 'title'=>'Menu'], ['langcode'=>'zh', 'title'=>'菜单'],],
            ],
            [
                'parent_id' => 2,
                'order'     => 7,
                'name'     => 'Operation log',
                'icon'      => 'fa-history',
                'uri'       => '/admin-operation-logs',
                'guard_name' => $guard_name,
                'data' => [['langcode'=>'en', 'title'=>'Operation log'], ['langcode'=>'zh', 'title'=>'操作日志'],],
            ],
        ];

        Schema::disableForeignKeyConstraints();
        Menu::truncate();
        MenusData::truncate();
        Schema::enableForeignKeyConstraints();

        foreach($menusData as $v){
            $menu = new Menu();
            $menu->parent_id = $v['parent_id'];
            $menu->order = $v['order'];
            $menu->name = $v['name'];
            $menu->icon = $v['icon'];
            $menu->uri = $v['uri'];
            $menu->guard_name = $v['guard_name'];

//            $tempData = [
//                'parent_id' => $v['parent_id'],
//                'order'     => $v['order'],
//                'name'     => $v['name'],
//                'icon'      => $v['icon'],
//                'uri'       => $v['uri'],
//                'guard_name' => $v['guard_name'],
//            ];
//$id = Menu::insertGetId($tempData);
            if($menu->save()){
                $ldata = [];
                foreach($v['data'] as $m){
                    $m['menu_id'] = $menu->id;
                    $ldata[] = $m;
                }
                MenusData::insert($ldata);
            }
        }

        // add role to menu.
        Menu::find(2)->roles()->save(RbacRole::first());
    }
}
