<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Template\Http\Controllers'], function()
{
    Route::get('/', 'LoginController@index');
    Route::post('/', 'LoginController@check');
    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@check');
    Route::get('/logout', 'LoginController@logout');

     Route::get('/test', 'LoginController@test');

});

Route::group(['middleware' => ['web','auth'], 'prefix' => 'template', 'namespace' => 'Modules\Template\Http\Controllers'], function()
{
    Route::get('/View-Navigations', 'NavigationsController@view_navigations')->name('admin.navigations');
    Route::get('/get-main-menus', 'NavigationsController@view_navigations')->name('admin.navigations_p');

    Route::post('/get-main-menus', 'NavigationsController@get_main_menus_info')->name('admin.get_main_menus_info');
    Route::post('/check-main-menus', 'NavigationsController@check_main_menus_info')->name('admin.check_main_menus_info');
    Route::post('/add-main-menus', 'NavigationsController@add_main_menus')->name('admin.add_main_menus');
    Route::post('/add-child-navigations-main', 'NavigationsController@add_child_navigations_main')->name('admin.add_child_navigations_main');

    // prevent method not allowed
    Route::get('/add-main-menus', 'NavigationsController@view_navigations');
    Route::get('/add-child-navigations-main', 'NavigationsController@view_navigations');
    Route::get('/check-main-menus', 'NavigationsController@view_navigations');

});