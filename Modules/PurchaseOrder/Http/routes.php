<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'purchaseorder', 'namespace' => 'Modules\PurchaseOrder\Http\Controllers'], function()
{
    Route::get('/', 'PurchaseOrderController@index')->name('po.index');

    Route::get('/no_po', 'PurchaseOrderController@no_po')->name('pr.no-pono');

    Route::post('/purchaseorder-no_pono_test', 'PurchaseOrderController@anyData')->name('pr.no_pono_test');

     Route::post('/purchase-order-list', 'PurchaseOrderController@pr_list')->name('pr.order-list-with-po');

    Route::post('/get-purchase-request-po', 'PurchaseOrderController@get_request_po')->name('pr.get-request-po');

    Route::post('/check-pono', 'PurchaseOrderController@check_po_no')->name('po.check_po_no');
    Route::post('/check-risno', 'PurchaseOrderController@check_ris_no')->name('po.check_ris_no');

    Route::post('/add-purchase-order', 'PurchaseOrderController@add_po_records')->name('po.add_po_records');

    Route::post('/update-purchase-order', 'PurchaseOrderController@update_po_records')->name('po.update_po_records');

    Route::post('/get-pr-supplier', 'PurchaseOrderController@get_pr')->name('po.get-pr-supplier');
    Route::post('/get-po', 'PurchaseOrderController@get_po')->name('po.get-po');
    Route::post('/get-pc', 'PurchaseOrderController@get_pc')->name('po.get-pc');
    Route::post('/po-pdf', 'PurchaseOrderController@po_pdf')->name('po.po_pdf');

    Route::get('/requisition-issue-slip', 'PurchaseOrderController@requisition')->name('po.requisition-issue-slip');
    Route::post('/add-purchase-requisition', 'PurchaseOrderController@add_requisition')->name('po.add_requisition');
    Route::post('/purchase-requisition-pdf', 'PurchaseOrderController@requisition_pdf')->name('po.po_requisition_pdf');
    Route::post('/purchase-requisition-pc-pdf', 'PurchaseOrderController@requisition_pc_pdf')->name('po.po_requisition_pc_pdf');

    Route::get('/purchase-order-acceptance', 'PurchaseOrderController@po_acceptance')->name('po.po-acceptance');
    Route::post('/add-purchase-acceptance', 'PurchaseOrderController@add_acceptance')->name('po.add_acceptance');
    Route::post('/purchase-acceptance-pdf', 'PurchaseOrderController@acceptance_pdf')->name('po.po_acceptance_pdf');







});
