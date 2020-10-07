<?php
use Illuminate\Support\Facades\Route;
/*
 * Blogs Management
 */
Route::group(['namespace' => 'Blogs', 'prefix' => 'bai-viet'], function () {
    // get List Blog
    Route::get('/', 'BlogsController@index')->name('blogs.index');

    // get List Blog
    Route::get('/danh-muc/{slug}', 'BlogsController@listByCategory')->name('blogs.listByCategory');

    //For Single-Blog
    Route::get('{slug}', 'BlogsController@detail')
       ->name('blogs.detail');
});
