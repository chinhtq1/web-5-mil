<?php
use Illuminate\Support\Facades\Route;
/*
 * Blogs Management
 */
Route::group(['namespace' => 'Products', 'prefix' => 'san-pham'], function () {
    // get List Product
    Route::get('/', 'ProductController@index')->name('products.index');

    // get List Product
    Route::get('/danh-muc/{slug}', 'ProductController@listByCategory')->name('products.listByCategory');

    //For Single-Product
    Route::get('{slug}', 'ProductController@detail')
        ->name('products.detail');
});
