<?php
use Illuminate\Support\Facades\Route;
/*
 * Blogs Management
 */
Route::group(['namespace' => 'Events', 'prefix' => 'su-kien'], function () {

    //For Single-Blog
    Route::get('{slug}', 'EventsController@detail')
        ->name('events.detail');
});
