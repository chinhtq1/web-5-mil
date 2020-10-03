<?php
/**
 * DocumentsManagement
 *
 */
    Route::group( ['namespace' => 'Documents'], function () {
        Route::resource('documents', 'DocumentsController');
        //For Datatable
        Route::post('documents/get', 'DocumentsTableController')->name('documents.get');
    });
