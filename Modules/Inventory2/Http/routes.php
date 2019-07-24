<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'inventory', 'namespace' => 'Modules\Inventory\Http\Controllers'], function()
{
        /*datatables url POST method*/
    Route::post('/set_datatables', 'InventoryDataTableController@set_datatables')->name('inventory.set_datatables');


    Route::get('/', 'InventoryController@index')->name('inventory.index');
    Route::get('/inventory', 'InventoryController@inventory')->name('inventory.show-all');

    Route::get('/inventory-ppe', 'PPEController@index')->name('inventory.ppe');

    Route::get('/set-inventory-ppe/{id}', 'PPEController@set_ppe_pr')->name('inventory.set_ppe_pr');

    Route::get('/edit-inventory-ppe/{id}', 'PPEController@edit_ppe_pr')->name('inventory.edit_ppe_pr');

    Route::post('/edit-inventory-ppe', 'PPEMonthlyReportController@update_monthly_report_new')->name('inventory.update_ppe_pr');

    Route::get('/inventory-wout-ppe', 'PPEController@wout_ppe')->name('inventory.wout-ppe');


    Route::get('/inventory-gso-code', 'GSOcodeController@index')->name('inventory.gso_code');


    Route::get('/inventory-ppe-code', 'PPEcodeController@index')->name('inventory.ppe_code');


    Route::post('/inventory-supplier', 'SupplierController@new_suppplier')->name('inv.new_suppplier');

    Route::get('/inventory-supplier', 'SupplierController@index')->name('inventory.supplier');

    Route::post('/inventory-gso-code', 'GSOcodeController@add_category')->name('inventory.add_gsocategory');

    Route::post('/inventory-gso-code-items', 'GSOcodeController@add_gsocodeitems')->name('inventory.add_gsocodeitems');

    Route::post('/add_ppecategory', 'PPEcodeController@add_ppecategory')->name('inventory.add_ppecategory');

    Route::post('/add_ppesubcategory', 'PPEcodeController@add_ppesubcategory')->name('inventory.add_ppesubcategory');

    Route::post('/add_ppeitems', 'PPEcodeController@add_ppeitems')->name('inventory.add_ppeitems');

    Route::post('/add_control_number', 'InventoryController@add_control_number')->name('inv.add_control_number');

    /**
     * PPE MONTHLY REPORT
     */
    Route::get('/ppe-monthly-report', 'PPEMonthlyReportController@index')->name('inventory.ppe-monthly-report');
    Route::post('/ppe-monthly-report', 'PPEMonthlyReportController@get_all')->name('inv.get_all_ppe_mnthly_report');
    Route::get('/ppe-monthly-report_new', 'PPEMonthlyReportController@monthly_report_new')->name('inv.monthly_report_new');
    Route::post('/ppe-monthly-report_new', 'PPEMonthlyReportController@save_monthly_report_new')->name('inv.save_monthly_report_new');
    Route::post('/set_ppe_mnthly_control_no', 'PPEMonthlyReportController@set_ppe_mnthly_control_no')->name('inv.set_ppe_mnthly_control_no');
    Route::post('/set_ppe_mnthly_report', 'PPEMonthlyReportController@set_ppe_mnthly_report')->name('inv.set_ppe_mnthly_report');
    Route::get('/ppe-monthly-report-generate', 'PPEMonthlyReportController@generate_report')->name('inventory.ppe-monthly-report-generate');
    Route::post('/ppe-monthly-report-generate-pdf', 'PPEMonthlyReportController@generate_report_pdf')->name('inventory.ppe-generate-report-pdf');


    // AUTO COMPLETE
    Route::post('/get_ppecodes', 'PPEcodeController@get_ppecodes')->name('inventory.get_ppecodes');
    Route::post('/get_ppesubcodes', 'PPEcodeController@get_ppesubcodes')->name('inventory.get_ppesubcodes');
    Route::post('/get_ppeitemcodes', 'PPEcodeController@get_ppeitemcodes')->name('inventory.get_ppeitemcodes');
    Route::post('/get_supplier', 'SupplierController@get_supplier')->name('inv.get_supplier');


});
