<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'administrator', 'namespace' => 'Modules\Administrator\Http\Controllers'], function()
{
    Route::get('/', 'AdministratorController@index')->name('admin.index');
    Route::get('/Users-List', 'AdministratorController@user_list')->name('admin.user_list');
    Route::post('/Users-Store', 'AdministratorController@user_store')->name('admin.user_store');
    Route::get('/Users-Delete/{id}', 'AdministratorController@user_delete')->name('admin.user_delete');
    Route::post('/Users-update/{id}', 'AdministratorController@user_update')->name('admin.user_update');
    Route::post('/Users-verify/{id}', 'AdministratorController@user_verify')->name('admin.user_verify');

    Route::get('/Group-List', 'AdministratorController@group_list')->name('admin.group_list');
    Route::post('/Group-List', 'AdministratorController@group_store')->name('admin.group_store');
    Route::post('/Group-update/{id}', 'AdministratorController@group_update')->name('admin.group_update');
    Route::get('/Group-Delete/{id}', 'AdministratorController@group_delete')->name('admin.group_delete');

    Route::get('/holidays', 'HolidayController@index')->name('admin.holiday');
    Route::post('/holidays/add', 'HolidayController@create')->name('admin.add-holiday');
    Route::post('/holidays/delete', 'HolidayController@destroy')->name('admin.delete-holiday');

});

Route::group(['middleware' => ['web'], 'namespace' => 'Modules\Administrator\Http\Controllers'], function()
{
    Route::get('/test', 'AdministratorController@test');
});


/*Department Code*/
Route::group(['middleware' => ['web','auth'], 'namespace' => 'Modules\Administrator\Http\Controllers'], function()
{
    Route::get('/dept_codes', 'DepartmentCodeController@dept_codes')->name('dept.code');
    Route::post('/dept_codes', 'DepartmentCodeController@add_deptcode')->name('dept.add_deptcode');
    Route::post('/add_subdeptcode', 'DepartmentCodeController@add_subdeptcode')->name('dept.add_subdeptcode');

    /*autocomplete*/
    Route::post('/get_deptcodes', 'DepartmentCodeController@get_deptcodes')->name('dept.get_deptcodes');
    Route::post('/get_subdeptcodes', 'DepartmentCodeController@get_subdeptcodes')->name('dept.get_subdeptcodes');
});

/*Holidays*/
// Route::group(['middleware' => ['web','auth'], 'namespace' => 'Modules\Administrator\Http\Controllers'], function()
// {
//     Route::get('/holidays', 'HolidayController@index')->name('holiday.lists');
//     Route::get('/holidays', 'HolidayController@create')->name('holiday.add-holiday');

  
// });