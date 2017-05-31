<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Store;

class StoresController extends Controller
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
        $stores = Store::all();
        return view("indexstore", [
          "stores" => $stores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createstore");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $store = new Store;
      $store->name = $request->get("name");
      $store->city = $request->get("city");
      $store->save();

      return redirect()->action('StoresController@index')->with('status', 'Storen är sparad!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $store = Store::find($id);

      return view("showstore", [
        "store" => $store
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $store = Store::find($id);
      return view("editstore", [
        "store" => $store
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
      $store = Store::find($id);
      $store->name = $request->get("name");
      $store->city = $request->get("city");

      $store->save();

      return redirect()->action('StoresController@index')->with('status', 'Storen är sparad!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Store::destroy($id);
      return redirect()->action('StoresController@index')->with('status', 'Storen är raderad xD!');
    }
}
