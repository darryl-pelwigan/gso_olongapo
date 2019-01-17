<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'manager', 'namespace' => 'Modules\Manager\Http\Controllers'], function()
{
    Route::get('/', 'PurchaseRequestController@index')->name('gsomngr.index');
});
