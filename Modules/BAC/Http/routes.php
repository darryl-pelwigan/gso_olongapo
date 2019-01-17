<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'bac', 'namespace' => 'Modules\BAC\Http\Controllers'], function()
{
    /*datatables url POST method*/
    Route::post('/set_datatables', 'BacDatatableController@set_datatables')->name('bac.set_datatables');

    /**
     * BAC LIST
     */
    Route::get('/', 'BACController@index')->name('bac.index');
    Route::post('/', 'BACController@get_bac')->name('bac.view_bac_cn');

    /**
     * Abstract List
    */
    Route::get('/absctrct_list', 'BacAbstrctController@absctrct_list')->name('bac.abstrct_list');
    Route::post('/absctrct_list', 'BacAbstrctController@get_abstrct')->name('bac.get_abstrct');
    Route::post('/process_abstrct', 'BacAbstrctController@process_abstrct')->name('bac.process_abstrct');
    Route::post('/pr-lists', 'BacAbstrctController@get_pr')->name('bac.get-pr-supplier');


    /**
     * BAC Unprocess Purchase Request
     */
    Route::get('/Purchase-Request', 'BACPRlistController@index')->name('bac.pr_list');
    Route::post('/BAC-CONTROL-NO', 'BACPRlistController@set_bac_control_no')->name('bac.set-bac-control-no');
    Route::post('/Process-PR', 'BACPRlistController@process_pr')->name('bac.process_pr');
    Route::post('/bac-controninfo-delete', 'BACPRlistController@destroy')->name('bac.delete-control-info');


    /**
     * Bac Templates
     */
    Route::get('/bac-templates', 'BACTemplatesController@index')->name('bac.templates');
    Route::get('/add-bac-templates', 'BACTemplatesController@add_template')->name('bac.add_template');
    Route::post('/new-bac-templates', 'BACTemplatesController@new_template')->name('bac.new_template');
    Route::get('/view-bac-templates/{id}', 'BACTemplatesController@view_template')->name('bac.view_template');

    /**
     * BIDS AND AWARDS COMMITTEE
     */
     Route::get('/awards_committee', 'BACawardscomitteeController@awards_committee')->name('bac.awards_committee');
     Route::post('/awards_committee', 'BACawardscomitteeController@set_awards_committee')->name('bac.set-bac-committee');
    Route::post('/rm_awards_committee', 'BACawardscomitteeController@rm_awards_committee')->name('bac.rm-bac-committee');
    Route::post('/rm_attested_by_committee', 'BACawardscomitteeController@rm_attested_by_committee')->name('bac.rm-bac-attested_by');
    Route::post('/rm_approved_by_committee', 'BACawardscomitteeController@rm_approved_by_committee')->name('bac.rm-bac-approved_by');


    /**
     * BAC Category
     * CategoryController
     */
    Route::get('/bac-category', 'CategoryController@index')->name('bac.category');
    Route::post('/bac-category', 'CategoryController@add_category')->name('bac.category');
    Route::post('/bac-getcategory', 'CategoryController@get_categ')->name('bac.get_categ');

    /**
     * BAC SOURCE OF FUND
     */
    Route::get('/bac-sof', 'SourceOfFundController@index')->name('bac.sof_i');
    Route::post('/add-bac-sof', 'SourceOfFundController@add_sof')->name('bac.sof');
    Route::post('/get-bac-sof', 'SourceOfFundController@get_sof')->name('bac.get_sof');

    /**
     * Supplier LIST
     */
    Route::get('/supplier_list', 'BACSuppliersController@supplier_list')->name('bac.supplier_list');
    Route::post('/supplier', 'BACSuppliersController@supplier')->name('bac.supplier');
    Route::post('/update_supplier', 'BACSuppliersController@update_supplier')->name('bac.update_supplier');
    Route::post('/delete_supplier', 'BACSuppliersController@delete_supplier')->name('bac.delete_supplier');
    
    /**
     * autocomplete
     */
    Route::post('/get_sof', 'BACPRlistController@get_sof')->name('bac.a_get_sof');
    Route::post('/a_get_categ', 'CategoryController@a_get_categ')->name('bac.a_get_categ');
    Route::post('/get_employee_name', 'BACemployeeController@get_employee_name')->name('bac.get_employee_name');
    Route::post('/a_get_position', 'BACemployeeController@a_get_position')->name('bac.a_get_position');

    /**
     * ITEMS DATATABLE
    */
    Route::post('/item_category/lists', 'ItemDatatableController@set_datatables')->name('bac.item_dt');

    /**
     * ITEM LISTS
     */
    Route::get('/item_lists', 'ItemsController@index')->name('bac.item_lists');
    Route::post('/item/add', 'ItemsController@create')->name('bac.add-item');
    Route::post('/item/view', 'ItemsController@show')->name('bac.get-item');
    Route::post('/item/delete', 'ItemsController@destroy')->name('bac.delete-item');
    /**
     * ITEM CATEGORY
    */
   Route::post('/item_category/add', 'ItemCategoryController@create')->name('bac.add-category-item');
   Route::post('/item_category/view', 'ItemCategoryController@show')->name('bac.get-category');
   Route::post('/item_category/delete', 'ItemCategoryController@destroy')->name('bac.delete-group');
   
    /**
     * ITEM CATEGORY GROUP
    */
   Route::post('/item_group/add', 'ItemCategoryGroupController@create')->name('bac.add-group-item');
   Route::post('/item_group/view', 'ItemCategoryGroupController@show')->name('bac.get-group');
   Route::post('/item_group/delete', 'ItemCategoryGroupController@destroy')->name('bac.delete-group');

    /**
     * PPMP
    */
   Route::get('/ppmp', 'PPMPController@index')->name('bac.ppmp');
   Route::post('/ppmp/add', 'PPMPController@create')->name('bac.ppmp_upload_add');
   Route::post('/ppmp/view', 'PPMPController@show')->name('bac.get_upload_lists');
   Route::post('/ppmp/delete', 'PPMPController@destroy')->name('bac.ppmp-upload-delete');

    /**
     * PPMP Approval
    */
   Route::get('/ppmp/pr', 'PurchasePPMPApprovalController@index')->name('bac.ppmp_pr_lists');
   Route::post('/ppmp/pr_edit', 'PurchasePPMPApprovalController@show')->name('bac.ppmp_pr');
   Route::post('/ppmp/approval', 'PurchasePPMPApprovalController@create')->name('bac.ppmp_approval');


    Route::get('/purchase/inspection', 'PRPostInspectionController@index')->name('bac.inspection');
    Route::post('/purchase/view-inspection', 'PRPostInspectionController@show')->name('bac.view-inspection');
    Route::post('/purchase/submit-inspection', 'PRPostInspectionController@create')->name('bac.submit-inspection');
    Route::post('/purchase/delete-inspection-item', 'PRPostInspectionController@destroy')->name('bac.delete-inspection-item');
    Route::post('/purchase/generate-inspection', 'PRPostInspectionController@report')->name('bac.generate-inspection');




});
