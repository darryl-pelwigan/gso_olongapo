<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'employee', 'namespace' => 'Modules\Employee\Http\Controllers'], function()
{
    Route::get('/', 'EmployeeController@index')->name('emp.list');
    // Route::post('/', 'EmployeeController@emp_list')->name('emp.emp_list');
    Route::post('/get_employee', 'EmployeeController@get_employee')->name('emp.get_employee');
    Route::post('/new_employee', 'EmployeeController@new_employee')->name('emp.new_employee');


    /**
     * Employyee route nEw access credentials
     */

    Route::post('/add_employee_creadentials', 'EmployeeCredentialsController@add_employee_creadentials')->name('emp.add_employee_creadentials');
    Route::post('/get_employee_credentials', 'EmployeeCredentialsController@get_employee_creadentials')->name('emp.get_employee_credentials');

    Route::post('/set_employee_creadentials', 'EmployeeCredentialsController@set_employee_creadentials')->name('emp.set_employee_creadentials');
    Route::post('/delete_employee_record', 'EmployeeCredentialsController@delete_employee_record')->name('emp.delete_employee_record');
    
    

    /* Auto Complete*/
    Route::post('/get_employee_name','EmployeeController@get_employee_name')->name('emp.get_employee_name');
    Route::post('/get_position','EmployeeController@get_position')->name('emp.get_position');
    Route::post('/get_department','EmployeeController@get_department')->name('emp.get_department');
});

Route::group(['middleware' => ['web'],  'namespace' => 'Modules\Employee\Http\Controllers'], function()
{
    Route::get('/test1', 'TestController@index');
});