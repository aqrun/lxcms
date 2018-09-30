<?php
use Illuminate\Routing\Router;

Route::group([
    'prefix' => config('backend.prefix'),
    'namespace' => 'Modules\Backend\Http\Controllers',
    'middleware' => ['web','backend'],
], function(Router $router){

    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login', 'AuthController@doLogin');
    Route::post('/logout', 'AuthController@logout')->name('logout');

    Route::get('/test', 'DashboardController@test');
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index');


    // admin users
    Route::get('/admin-users', 'AdminUsersController@index')->name('admin-users.index');
    Route::post('/admin-users/index-data', 'AdminUsersController@indexData')->name('admin-users.index-data');

    // menus
    Route::get('/menus', 'MenusController@index')->name('menus.index');
    Route::post('/menus/index-data', 'MenusController@indexData')->name('menus.index-data');

    //rbac roles permission
    Route::get('/rbac-roles', 'RbacRolesController@index')->name('rbac-roles.index');
    Route::post('/rbac-roles/index-data', 'RbacRolesController@indexData')->name('rbac-roles.index-data');

    Route::get('/rbac-permissions', 'RbacPermissionsController@index')->name('rbac-permissions.index');
    Route::post('/rbac-permissions/index-data', 'RbacPermissionsController@indexData')->name('rbac-permissions.index-data');

    //system logs
    Route::get('/admin-operation-logs', 'AdminOperationLogsController@index')->name('admin-operation-logs.index');
    Route::post('/admin-operation-logs/index-data', 'AdminOperationLogsController@indexData')->name('admin-operation-logs.index-data');

});
