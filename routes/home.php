<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/sales', 'OrdersController@sales')->name('sales');
Route::get('/purchases', 'OrdersController@purchases')->name('purchases');
Route::resource('/products', 'ProductsController');