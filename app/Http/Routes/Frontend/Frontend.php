<?php

/**
 * Frontend Controllers
 */
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('macros', 'FrontendController@macros')->name('frontend.macros');
Route::get('tracks/', 'TracksController@index')->name('frontend.tracks.index');
Route::get('track/{slug}', 'TracksController@showTrack')->name('frontend.tracks.track');

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function() {
        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
        Route::get('profile/edit', 'ProfileController@edit')->name('frontend.user.profile.edit');
        Route::patch('profile/update', 'ProfileController@update')->name('frontend.user.profile.update');
        Route::get('tracks/add', 'UserTracksController@add')->name('frontend.user.tracks.add');
        Route::post('tracks/create', ['uses' => 'UserTracksController@create', 'as' => 'tracks.create']);
    });
});