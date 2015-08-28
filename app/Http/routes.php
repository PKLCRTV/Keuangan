	<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Auth\AuthController@getLogin');
Route::get('home', 'HomeController@index');
Route::resource('kas', 'KasController');
Route::resource('perkiraan', 'PerkiraanController');

Route::get('laporankas', 'LaporanKasController@index');
Route::post('laporankas', 'LaporanKasController@index');

Route::get('laporanrugilaba', 'LaporanRugilabaController@index');
Route::post('laporanrugilaba', 'LaporanRugilabaController@index');

Route::get('laporanneraca', 'LaporanNeracaController@index');
Route::post('laporanneraca', 'LaporanNeracaController@index');

// Route::get('laporan', 'LaporanController@index');
// Route::get('laporan/kas', 'LaporanController@kas');
// Route::post('laporan/kas/find', 'LaporanController@kas_find');
// Route::get('laporan/rugilaba', 'LaporanController@rugilaba');
// Route::get('laporan/neraca', 'LaporanController@neraca');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');