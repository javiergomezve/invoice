<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customers', 'CustomerController@search');
Route::get('/products', 'ProductController@search');

Route::resource('/invoices', 'InvoiceController');
