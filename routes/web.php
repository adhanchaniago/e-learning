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

// Route::get('/', 'GuestController@getGuestHome')->name('getGuestHome');
Route::get('/', function() {
	return redirect()->route('getLoginPage');
});
Route::get('/logout', 'Login\LoginController@getLogout')->name('getLogout');

// Auth Section

Route::group(['middleware' => ['guest']], function(){

    Route::get('/login', 'Login\LoginController@getLoginPage')->name('getLoginPage');
    Route::post('/login', 'Login\LoginController@postLoginPage')->name('postLoginPage');

});

// Staff Section

Route::group(['prefix' => 'staff', 'middleware' => ['staff']], function() {

    Route::get('/', function() {
        return redirect()->route('getStaffHomePage');
    });

    Route::get('/home', 'Staff\MainController@getStaffHomePage')->name('getStaffHomePage');

    Route::get('/profil/ubah', 'General\ProfilController@getChangeProfilPage')->name('getChangeProfilPage');
    Route::put('/profil/ubah', 'General\ProfilController@putChangeProfil')->name('putChangeProfil');

    Route::get('/password/ubah', 'General\PasswordController@getChangePasswordPage')->name('getChangePasswordPage');
    Route::put('/password/ubah', 'General\PasswordController@putChangePassword')->name('putChangePassword');

    Route::get('/angkatandiklat', 'Staff\AngkatanDiklatController@getAngkatanDiklatPage')->name('getAngkatanDiklatPage');
    Route::get('/angkatandiklat/data', 'Staff\AngkatanDiklatController@getDataAngkatanDiklat')->name('getDataAngkatanDiklat');
    Route::get('/angkatandiklat/tambah', 'Staff\AngkatanDiklatController@getAddAngkatanDiklatPage')->name('getAddAngkatanDiklatPage');
    Route::post('/angkatandiklat/tambah', 'Staff\AngkatanDiklatController@postAddAngkatanDiklatPage')->name('postAddAngkatanDiklatPage');
    Route::get('/angkatandiklat/ubah/{id}', 'Staff\AngkatanDiklatController@getEditAngkatanDiklatPage')->name('getEditAngkatanDiklatPage');
    Route::put('/angkatandiklat/ubah/{id}', 'Staff\AngkatanDiklatController@putEditAngkatanDiklat')->name('putEditAngkatanDiklat');
    Route::get('/angkatandiklat/hapus/{id}', 'Staff\AngkatanDiklatController@getHapusAngkatanDiklatPage')->name('getHapusAngkatanDiklatPage');
    Route::delete('/angkatandiklat/hapus/{id}', 'Staff\AngkatanDiklatController@deleteHapusAngkatanDiklat')->name('deleteHapusAngkatanDiklat');

    Route::get('/userakun', 'Staff\UserAkunController@getUserAkunPage')->name('getUserAkunPage');

});

// Instruktur Section

// Peserta Section

// Pimpinan Section
