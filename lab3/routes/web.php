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

$app->get('/products', function () use ($app) {
    // Convert our products from json to object i PHP
	$products = json_decode(file_get_contents("../resources/products.json"));

    // Return all products in JSON-format
	return response()->json($products);
});
