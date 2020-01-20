<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'department', 'namespace' => 'Modules\Department\Http\Controllers'], function()
{
    /*datatables url POST method*/
    Route::post('/set_datatables', 'DeptDatatableController@set_datatables')->name('dept.set_datatables');


    Route::get('/', 'DepartmentController@index')->name('dept.index');
    Route::get('/purchase_request', 'DepartmentController@index')->name('dept.purchase_request');


    /**
     * Purchase Request for Departments
     */
    Route::post('/add_purchase_request', 'DetpPurchaseRequestController@add_purchase_request')->name('dept.add_purchase_request');
    Route::get('/purchase_request/edit/', 'DetpPurchaseRequestController@pr_edit')->name('dept.pr_edit');
    Route::post('/purchase_request/save_edit/', 'DetpPurchaseRequestController@save_edit')->name('dept.pr_edit_save');
    Route::post('/delete_pr', 'DetpPurchaseRequestController@destroy')->name('dept.delete_pr');
    Route::post('/import_pr', 'DetpPurchaseRequestController@import')->name('dept.import_pr');
    

   
});
