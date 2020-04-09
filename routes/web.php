<?php

Route::resource('/','LandingPageController');
Route::post('/','LandingPageController@mail')->name('mail');

Auth::routes();

Route::group([
    'prefix' => '/admin',
    'middleware' => ['auth']
], function() {
        Route::get('/', 'AdminController@index')->name('home');
        Route::resource('/settings','SettingController');


        Route::get('/image','ImageController@create')->name('image');
        Route::post('/image','ImageController@store');
        Route::delete('/image','ImageController@destroy')->name('image.destroy');
    });