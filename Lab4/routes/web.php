<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('reviews', 'ReviewsController@index');
$app->get('reviews/{id}', 'ReviewsController@show');

$app->get('/products', 'ProductsController@index');
$app->get('/products/{id}', 'ProductsController@show');

$app->get('stores', 'StoresController@index');
$app->get('stores/{id}', 'StoresController@show');
