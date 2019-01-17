<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'abstrct', 'namespace' => 'Modules\Abstrct\Http\Controllers'], function()
{
    /**
     * datatable
     */
    Route::post('/abstrct-datatables', 'AbstrctDataTableController@set_datatables')->name('absctrct.set_datatables');

    /**
     * Purchase request
     */
    Route::get('/', 'AbstrctController@index')->name('absctrct.pr_list');
    Route::post('/get_control_number', 'AbstrctController@get_control_number')->name('absctrct.get_control_number');
    Route::post('/processes', 'AbstrctController@processes')->name('abstrct.processes');

    /**
    * Abstract List
    */
    Route::get('/absctrct_list', 'AbstrctController@absctrct_list')->name('absctrct.index');
    Route::post('/absctrct_list', 'AbstrctController@get_abstrct')->name('abstrct.get_abstrct');
    Route::post('/absctrct_list_update', 'AbstrctController@absctrct_list_update')->name('abstrct.absctrct_list_update');
    Route::get('/absctrct_list_export_pdf', 'AbstrctController@absctrct_list_pdf')->name('abstrct.absctrct_list_export_pdf');
    Route::post('/delete-abstract', 'AbstrctController@delete_abstract')->name('abstrct.delete-abstract');

    /**
    * Abstract Signee
    */
    Route::get('/abstract-signee', 'AbstrctSigneeController@index')->name('absctrct.signee');
    Route::post('/abstract-signee-save', 'AbstrctSigneeController@update')->name('absctrct.save-signee');

   

});
