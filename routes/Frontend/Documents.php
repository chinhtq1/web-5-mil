<?php
use Illuminate\Support\Facades\Route;
/*
 * Blogs Management
 */
Route::group(['namespace' => 'Documents', 'prefix' => 'documents'], function () {
    // get List Blog
    Route::get('/', 'DocumentController@index')->name('documents.index');

    // get List Blog
    Route::get('/category/{slug}', 'DocumentController@listByCategory')->name('documents.listByCategory');

});
