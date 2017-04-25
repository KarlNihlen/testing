<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
      $products = Product::all();
      return response()->json($products);
    }

    public function show($id){
      $product = Product::find($id);
      $product->reviews = $product->reviews;
      $product->stores = $product->stores;
      return response()->json($product);
    }


    public function store(Request $request){
      $product = new Product;
      $product->title = $request->get("title");
      $product->brand = $request->get("brand");
      $product->price = $request->get("price");
      $product->image = $request->get("image");
      $product->description = $request->get("description");
      $product->save();
      $product_id = DB::connection() -> getPdo() -> lastInsertId();
      foreach ($request->get("stores") as $store) {

        DB::table('product_store')->insert([
          "product_id" => $product_id,
          "store_id" => $store,
        ]);
      }
    }
}
