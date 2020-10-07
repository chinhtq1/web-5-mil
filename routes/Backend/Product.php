<?php
/**
 * Products
 *
 */
Route::group( ['namespace' => 'Products'], function () {
    Route::resource('products', 'ProductsController',['except' => ['show']]);
    //For Datatable
    Route::post('products/get', 'ProductsTableController')->name('products.get');
});

