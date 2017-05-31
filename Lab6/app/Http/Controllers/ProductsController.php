<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Store;

class ProductsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth', ['except' =>['index', 'show']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();

      return view("index", [
        "products" => $products
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();
        return view("create", [
          "stores" => $stores,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $product = new Product;
      $product->title = $request->get("title");
      $product->brand = $request->get("brand");
      $product->image = $request->get("image");
      $product->description = $request->get("description");
      $product->price = $request->get("price");
      $product->save();

      $product_id = DB::connection()->getPdo()->lastInsertId();

      foreach ($request->get("stores") as $store) {
        DB::table('product_store')->insert([
          "product_id" => $product_id,
          "store_id" => $store,

        ]);
      }

      return redirect()->action('ProductsController@index')->with('status', 'Produkten är sparad!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::find($id);
      $product->reviews = $product->reviews;
      $product->stores = $product->stores;
      return view("show", [
        "product" => $product
      ]);

      //return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view("edit", [
          "product" => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->get("title");
        $product->brand = $request->get("brand");
        $product->image = $request->get("image");
        $product->description = $request->get("description");
        $product->price = $request->get("price");
        $product->save();

        return redirect()->action('ProductsController@index')->with('status', 'Produkten är sparad!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Product::destroy($id);
      return redirect()->action('ProductsController@index')->with('status', 'Produkten är raderad xD!');
    }
}
