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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/places/restaurant','PlaceController@restaurant');

Route::get('/places/store','PlaceController@store');

Route::get('/places/lodging','PlaceController@lodging');

Route::get('/places/liquor_store','PlaceController@liquor_store');

Route::get('/places/airport','PlaceController@airport');

Route::get('/places/info/{name}/{id}','PlaceController@info');

Route::resource('places', 'PlaceController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/home/autocomplete', 'HomeController@autocomplete');