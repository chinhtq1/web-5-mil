<?php

/*
 * Blogs Categories Management
 */
Route::group(['namespace' => 'ProductCategories'], function () {
    Route::resource('productcategories', 'ProductCategoriesController', ['except' => ['show']]);

    //For DataTables
    Route::post('productgcategories/get', 'ProductCategoriesTableController')
        ->name('productcategories.get');
});
