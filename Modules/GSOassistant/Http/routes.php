<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'gsoassistant', 'namespace' => 'Modules\GSOassistant\Http\Controllers'], function()
{
    Route::get('/', 'GSOassistantController@index')->name('gso.index');


    /* GSO Department User List*/
    Route::get('/dept_user_list', 'GSOassistantController@index')->name('gso_assistant.dept_user_list');

    /**
     * BIDS AND AWARDS COMMITTEE
     */
    Route::get('/gso_committee_list', 'GSOcommitteeListController@committee_list')->name('gso_assistant.committee_list');
    Route::post('/gso_gso_committee', 'GSOcommitteeListController@set_gso_committee')->name('gso.set-bac-committee');
    Route::post('/gso_rm_bac_committee', 'GSOcommitteeListController@rm_bac_committee')->name('gso.rm-bac-committee');
    Route::post('/gso_rm_attested_by_committee', 'GSOcommitteeListController@rm_attested_by_committee')->name('gso.rm-bac-attested_by');
    Route::post('/gso_rm_approved_by_committee', 'GSOcommitteeListController@rm_approved_by_committee')->name('gso.rm-bac-approved_by');

    Route::get('/gso_template', 'GSOassistantController@gsotemplate')->name('gso.templates');
    Route::get('/gso_addtemplates', 'GSOassistantController@gso_addtemplate')->name('gso.add_template');
    Route::post('/new-gso-templates', 'GSOassistantController@gso_newtemplate')->name('gso.new_template');




 	/**
     * autocomplete
     */
    Route::post('/gso_get_employee_name', 'GSOcommitteeListController@get_employee_name')->name('gso.get_employee_name');
    Route::post('/gso_a_get_position', 'GSOcommitteeListController@a_get_position')->name('gso.a_get_position');

    /**
     * PDF
     */
    Route::get('/procurementpdf', 'GSOassistantController@procurement_record_pdf')->name('gso.procurementpdf');

     Route::post("/gso_template", "GSOassistantController@set_gsopdf_template")->name('gso.gso_template');


    /*datatables url POST method*/
    Route::post('/gsoset_datatables', 'GsoDatatableController@set_datatables')->name('gso.set_datatables');


     /**
     * GSO ASSISTANT SETTINGS
     */
    Route::get('/settings', 'SettingsController@index')->name('gso_assistant.settings');
    Route::get('/proc_methods', 'SettingsController@proc_methods')->name('gso_assistant.proc_methods');
    Route::post('/proc_methods', 'SettingsController@proc_methods_save')->name('gso.proc_methods_save');
    Route::post('/proc_methods_get', 'SettingsController@get_proc_methods')->name('gso.proc_methods_get');
    Route::post('/proc_methods_update', 'SettingsController@proc_methods_update')->name('gso.proc_methods_update');
    Route::post('/proc_methods_del', 'SettingsController@proc_methods_delete')->name('gso_proc_methods_delete');


    Route::get('/pr_signee', 'SettingsController@pr_signee')->name('gso_assistant.pr_signee');
    Route::post('/pr_signee', 'SettingsController@pr_signee_save')->name('gso.pr_signee_save');
    Route::post('/get_signee', 'SettingsController@get_pr_signee')->name('gso.get_pr_signee');
    Route::post('/update_signee', 'SettingsController@update_pr_signee')->name('gso_update_pr_signee');
    Route::post('/deleteSignee', 'SettingsController@deleteSignee')->name('gso.deleteSignee');



});
