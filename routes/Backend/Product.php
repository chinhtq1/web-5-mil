<?php
/**
 * Products
 *
 */
Route::group( ['namespace' => 'Products'], function () {
    Route::resource('products', 'ProductsController');
    //For Datatable
    Route::post('products/get', 'ProductsTableController')->name('products.get');
});

