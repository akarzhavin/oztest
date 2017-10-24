<?php

Route::get('/', function(){
    return redirect()->route('sales');
})->name('home');
Route::get('/sales', 'OrdersController@sales')->name('sales');
Route::get('/purchases', 'OrdersController@purchases')->name('purchases');

Route::get('/products', 'ProductsController@index')->name('products');

Route::get('/products/{id}/edit', 'ProductsController@edit');
Route::put('/products/{id}/edit', 'ProductsController@update');

Route::get('/products/create', 'ProductsController@create');
Route::post('/products/create', 'ProductsController@store');