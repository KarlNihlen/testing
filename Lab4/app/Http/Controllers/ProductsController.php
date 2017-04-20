<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(){
      $products = Product::all();//DB::table('products')->get();//
      return response()->json($products);
    }

    public function show($id){
      $product = Product::find($id);
      $product->title = $product->title;
      $product->price = $product->price;
      return response()->json($product);
    }
}
