<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(){
      $products = Product::all();
      return response()->json($products);
    }

    public function show($id){
      $product = Product::find($id);
      //$product->title = $product->title;
      //$product->price = $product->price;
      $product->review = $product->review;
      //$product->store = $product->store;
      return response()->json($product);
    }
}
