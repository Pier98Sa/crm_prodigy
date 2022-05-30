<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products', 'Api\ProductController@index');
Route::post('/leads', 'Api\LeadController@store');


