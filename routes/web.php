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

Route::get('/', 'CatalogController@index');
Route::get('/{id}', 'CatalogController@product')->where('id', '([0-9]+)');
Route::post('/{id}', 'CatalogController@order')->where('id', '([0-9]+)');

Auth::routes();
Route::get('/error', 'CatalogController@index');