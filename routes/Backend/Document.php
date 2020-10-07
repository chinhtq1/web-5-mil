<?php
/**
 * DocumentsManagement
 *
 */
    Route::group( ['namespace' => 'Documents'], function () {
        Route::resource('documents', 'DocumentsController', ['except' => ['show']]);
        //For Datatable
        Route::post('documents/get', 'DocumentsTableController')->name('documents.get');
    });
