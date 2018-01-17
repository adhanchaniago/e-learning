<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Guest Section

Route::get('/', 'GuestController@getGuestHome')->name('getGuestHome');
Route::get('/logout', 'Login\LoginController@getLogout')->name('getLogout');

// Auth Section

Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', 'Login\LoginController@getLoginPage')->name('getLoginPage');
    Route::post('/login', 'Login\LoginController@postLoginPage')->name('postLoginPage');
});

// Staff Section

Route::group(['prefix' => 'staff', 'middleware' => ['']], function() {
    // Route::get('/)
});

// Instruktur Section

// Peserta Section

// Pimpinan Section
