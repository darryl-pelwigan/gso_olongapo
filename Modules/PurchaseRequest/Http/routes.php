<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'purchaserequest', 'namespace' => 'Modules\PurchaseRequest\Http\Controllers'], function()
{
        Route::post('/set_datatables', 'PRDatatableController@set_datatables')->name('popr.set_datatables');

    Route::get('/', 'PurchaseRequestController@index')->name('pr.index');

    Route::post('/get_pr', 'PurchaseRequestController@get_pr')->name('pr.get_pr');

    Route::post('/update_pr', 'PurchaseRequestController@update_pr')->name('pr.update_pr');

    Route::post('/purchase-request-list', 'PurchaseRequestController@anyData')->name('pr.request-list');

    Route::post('/add_purchase_request', 'PurchaseRequestController@add_purchase_request')->name('pr.add_purchase_request');

    Route::post('/get_pr_counter', 'PurchaseRequestController@get_pr_counter')->name('pr.get_pr_counter');

    Route::get('/purchase_request/edit_view/', 'PurchaseRequestController@pr_edit')->name('pr.pr_edit');
    Route::get('/purchase_request/pdf/{prid}/{form}', 'PurchaseRequestController@pr_pdf')->name('pr.pr_pdf');
    Route::post('/purchase_request/save_edit/', 'PurchaseRequestController@save_edit')->name('pr.pr_edit_save');
      
    Route::post('/get-purchase-request', 'PurchaseRequestController@get_request')->name('pr.get-request');


});
