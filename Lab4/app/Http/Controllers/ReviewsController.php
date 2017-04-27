<?php

namespace App\Http\Controllers;
use App\Product;
use App\Review;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
  public function index(){
    $reviews = Review::all();
    return response()->json($reviews);
  }

  public function show($id){
    $review = Review::find($id);
    $review->product = $review->product;
    return response()->json($review);
  }
}
