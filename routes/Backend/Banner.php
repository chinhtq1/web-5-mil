<?php
/**
 * Banners
 *
 */
Route::group( ['namespace' => 'Banners'], function () {
        Route::resource('banners', 'BannersController', ['except' => ['show']]);
        //For Datatable
        Route::post('banner/get', 'BannersTableController')->name('banners.get');
});
