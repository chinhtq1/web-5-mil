<?php

Route::group( ['namespace' => 'DocumentCategories'], function () {
    Route::resource('documentcategories', 'DocumentCategoriesController');
    Route::post('documentcategories/get', 'DocumentCategoriesTableController')->name('documentcategories.get');
});
