<?php
/**
 * Routes for : Subcribes
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'Subcribes'], function () {
	    Route::get('subcribes', 'SubcribesController@index')->name('subcribes.index');
	    Route::get('subcribes/create', 'SubcribesController@create')->name('subcribes.create');
	    Route::post('subcribes', 'SubcribesController@store')->name('subcribes.store');
	    
	    Route::delete('subcribes/{subcribe}', 'SubcribesController@destroy')->name('subcribes.destroy');
	    //For Datatable
	    Route::post('subcribes/get', 'SubcribesTableController')->name('subcribes.get');
	});
	
});