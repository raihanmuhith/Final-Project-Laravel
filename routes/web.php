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
    //profile
    Route::resource('/profile','ProfileController');

    //laravel library/packages
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/beritas/export', 'BeritaController@export');
    Route::get('/pdf-detail/{berita_id}','BeritaController@pdf');
    

    //berita
    Route::get('/beritas', 'BeritaController@index');
    Route::get('/beritas/create', 'BeritaController@create');
    Route::post('/beritas', 'BeritaController@store');
    Route::get('/beritas/{beritas_id}', 'BeritaController@show');
    Route::get('/beritas/{beritas_id}/edit', 'BeritaController@edit');
    Route::put('/beritas/{beritas_id}', 'BeritaController@update');
    Route::delete('/beritas/{beritas_id}', 'BeritaController@destroy');

    //comments
    Route::get('/comments', 'CommentController@index');
    Route::post('/comments/{beritas_id}','CommentController@create');
    Route::get('/comments/{comment_id}/edit', 'CommentController@edit');
    Route::put('/comments/{comment_id}', 'CommentController@update');
    Route::delete('/comments/{comment_id}', 'CommentController@destroy');
    
    //tags
    Route::get('/tags', 'TagsController@index');
    Route::get('/tags/create', 'TagsController@create');
    Route::post('/tags', 'TagsController@store');
    Route::get('/tags/{tags_id}', 'TagsController@show');
    Route::get('/tags/{tags_id}/edit', 'TagsController@edit');
    Route::put('/tags/{tags_id}', 'TagsController@update');
    Route::delete('/tags/{tags_id}', 'TagsController@destroy');
    
});

Auth::routes();


