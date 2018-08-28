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

// menus
    Route::get('/menus', 'MenusController@index')->name('menus.index');

//rbac roles permission
    Route::get('/rbac-roles', 'RbacRolesController@index')->name('rbac-roles.index');

    Route::get('/rbac-permissions', 'RbacPermissionsController@index')->name('rbac-permissions.index');

//system logs
    Route::get('/admin-operation-logs', 'AdminOperationLogsController@index')->name('admin-operation-logs.index');

});