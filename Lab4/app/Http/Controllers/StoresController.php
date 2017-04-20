<?php

namespace App\Http\Controllers;
use App\Store;

class StoresController extends Controller
{
    public function index(){
      $stores = Store::all();
      return response()->json($stores);
    }

    public function show($id){
      $store = Store::find($id);
      $store->name = $store->name;
      $store->city = $store->city;
      return response()->json($store);
    }
}
