<?php

use Illuminate\Http\Request;
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



$app->get('/products/{id}', function ($id) {
    // Convert our products from json to object i PHP
	$products = json_decode(file_get_contents('../resources/products.json'));
	foreach ($products->products as $product) {
		if($id == $product->id) {
			return response()->json($product);
		}
	}
    // Return all products in JSON-format
	return "no movie with that id was found :(";
});

$app->post('/products', function (Request $request) {
	$id = $request->input("id");
	$title = $request->input("title");
	$price = $request->input("price");

	if($id == NULL or $title == NULL or $price == NULL) {
		return "Missing id, title or price :(";
	}
	$products = json_decode(file_get_contents('../resources/products.json'), true);

	$product = [];
	$product["id"] = (int)$id;
	$product["title"] = $title;
	$product["price"] = (int)$price;

	$products["products"][] = $product;

	file_put_contents('../resources/products.json', json_encode($products));

	return "you did it ;)";
});

$app->put('/products/{id}', function(Request $request, $index) {
	echo "Will soon update the product with id:" . $index;
	$title = $request->input("title");
	$price = $request->input("price");
	if($index == NULL or $title == NULL or $price == NULL) {
		return "Missing id, title or price :(";
	}

	$products = json_decode(file_get_contents('../resources/products.json'));

	foreach ($products->products as $product) {

		if($index == $product->id) {
			echo "test";
			$productindex = array_search($product, $products->products);
			if($productindex >= 0) {
				unset($products->products[$productindex]);

				$product = new stdClass();
				$product->id = $index;
				$product->title = $title;
				$product->price = (int)$price;
				$products->products[] = $product;


				file_put_contents('../resources/products.json', json_encode($products));
				echo "product has been changed ;) successfully!";
			}
			else {
				return "no products with that id.";
			}
		}
	}
});

$app->delete('/products/{id}', function($index) {

	$products = json_decode(file_get_contents('../resources/products.json'));
	foreach ($products->products as $product) {

		if($index == $product->id) {
			$productindex = array_search($product, $products->products);
			if($productindex >= 0) {
				unset($products->products[$productindex]);
				file_put_contents('../resources/products.json', json_encode($products));
				echo "product has been removed successfully!";
			}
		}
	}
    // Return all products in JSON-format
	return "Will soon delete the product with id:" . $index;
});
