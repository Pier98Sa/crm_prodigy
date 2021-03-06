<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();
//rotta home controller
Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function (){
    //admin
    Route::get('/', 'HomeController@index')->name('home');
    //profile edit
    Route::get('user', 'UserController@edit')->name('user.edit');
    //profile update
    Route::put('user', 'UserController@update')->name('user.update');
    //products route
    Route::resource('products',  'ProductController');
    //clients route
    Route::resource('clients',  'ClientController');
    //informations route
    Route::resource('informations',  'InformationController');
    //quotes route
    Route::resource('quotes',  'QuoteController');
    //leads route
    Route::resource('leads','LeadController');

});

//rotta catch all
Route::get("{any?}", function(){
    return view ("guests.home");
})->where("any", ".*");
