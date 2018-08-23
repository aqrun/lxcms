<?php

Route::group([
    'prefix' => config('backend.prefix'),
    'namespace' => 'Backend',
    'middleware' => ['backend'],
], function(){

    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login', 'AuthController@doLogin');
    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::get('/test', 'DashboardController@test');
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index');


});
