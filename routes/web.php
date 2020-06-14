<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/', 'AdvertController@index')->name('adverts.index');

Route::post('/', 'AdvertController@store')->name('adverts.store')->middleware('advert');

Route::resource('/adverts', 'AdvertController')->except(['index', 'store', 'show'])->middleware('advert');

Route::resource('/adverts', 'AdvertController')->only(['show']);

Route::get('/profile', 'ProfileController@index')->name('profiles.index');

Route::resource('/profiles', 'ProfileController')->only(['store', 'update', 'show']);

//Route::get('/documents/1', 'DocumentController@show')->name('documents.show');

Route::resource('/documents', 'DocumentController')->only(['index', 'store', 'show']);

Route::get('/admin/users', 'UserController@index')->name('users.index');

Route::resource('/comments', 'CommentController');
