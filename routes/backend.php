<?php

Route::group([
    'prefix' => config('backend.prefix'),
    'namespace' => 'Backend',
], function(){

    Route::get('/login', 'AuthController@login');
    Route::post('/login', 'AuthController@doLogin');
    Route::get('/logout', 'AuthController@logout');

    Route::group(['middle' => 'auth:admin_guard'], function(){
        Route::get('/test', 'DashboardController@test');
        Route::get('/dashboard', 'DashboardController@index');
    });


});