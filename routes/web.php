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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function(){
        return view('layout.master');
    });
    Route::resource('/profile','ProfileController');
    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();

//berita
Route::get('/beritas', 'BeritaController@index');
Route::get('/beritas/create', 'BeritaController@create');
Route::post('/beritas', 'BeritaController@store');
Route::get('/beritas/{beritas_id}', 'BeritaController@show');
Route::get('/beritas/{beritas_id}/edit', 'BeritaController@edit');
Route::put('/beritas/{beritas_id}', 'BeritaController@update');
Route::delete('/beritas/{beritas_id}', 'BeritaController@destroy');
