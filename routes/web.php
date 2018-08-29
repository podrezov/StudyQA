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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::group(['prefix' => 'text'], function (){
    Route::get('/create', 'WelcomeController@create')->name('text.create');
    Route::get('/{page}/edit', 'WelcomeController@edit')->name('text.update.show');
    Route::post('/{page}/update', 'WelcomeController@store')->name('text.update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'news'], function (){
   Route::get('/', 'NewsController@index')->name('news');
   Route::get('/create', 'NewsController@create')->name('news.create');
   Route::post('/create', 'NewsController@store')->name('news.store');
   Route::get('/{news}/show', 'NewsController@show')->name('news.show');
   Route::get('/{news}/delete', 'NewsController@delete')->name('news.delete');
   Route::get('/{news}/update', 'NewsController@edit')->name('news.update.show');
   Route::post('/{news}/update', 'NewsController@update')->name('news.update');
});

Route::group(['prefix' => 'gallery'], function (){
   Route::get('/', 'GalleryController@index')->name('gallery');
   Route::post('/upload', 'GalleryController@upload')->name('gallery.upload');
});
