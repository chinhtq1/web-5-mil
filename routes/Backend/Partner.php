<?php
/**
 * Partners
 *
 */

Route::group(['namespace' => 'Partners'], function () {
    Route::resource('partners', 'PartnersController', ['except' => ['show']]);
    //For Datatable
    Route::post('partners/get', 'PartnersTableController')->name('partners.get');
});
    
