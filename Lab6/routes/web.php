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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['middleware' => 'auth'], function () {
//  Route::resource('/products', 'ProductsController', ['except' => [
//      'index', 'show'
//    ]]);
//    Route::resource('/products', 'ProductsController', ['only' => [
//      'index', 'show'
//      ]]);
//});

//Route::get('/products', 'ProductsController@create');

Route::resource('/products', 'ProductsController');

Route::resource('/stores', 'StoresController');
Route::resource('/reviews', 'ReviewsController');
