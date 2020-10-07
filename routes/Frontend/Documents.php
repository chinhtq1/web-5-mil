<?php
use Illuminate\Support\Facades\Route;
/*
 * Blogs Management
 */
Route::group(['namespace' => 'Documents', 'prefix' => 'tai-lieu'], function () {
    // get List Blog
    Route::get('/', 'DocumentController@index')->name('documents.index');

    // get List Blog
    Route::get('/danh-muc/{slug}', 'DocumentController@listByCategory')->name('documents.listByCategory');

});
