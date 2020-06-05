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

Route::post('/', 'AdvertController@store')->name('adverts.store');

Route::resource('adverts', 'AdvertController')->except(['index', 'store']);

Route::resource('profile', 'ProfileController')->only([
    'index', 'store'
]); //нужно ли мн.число profiles?

Route::get('/documents', 'DocumentController@index')->name('documents.index');

Route::post('/documents/upload', 'DocumentController@upload')->name('documents.upload');

Route::get('/users', 'UserController@index')->name('users.index');
