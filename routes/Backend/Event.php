<?php
/**
 * Events
 *
 */
Route::group( ['namespace' => 'Events'], function () {
    Route::resource('events', 'EventsController',  ['except' => ['show']]);
    //For Datatable
    Route::post('events/get', 'EventsTableController')->name('events.get');
});
