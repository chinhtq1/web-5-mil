<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');

Route::get('/lien-he', function (){
    return view('frontend.contact.contact');
})->name('contact');

Route::get('/ve-chung-toi', 'FrontendController@about')->name('about-us');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
    });
});

/*
* Show pages
*/
Route::get('/trang/{slug}', 'FrontendController@showPage')->name('pages.show');
