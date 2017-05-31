<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;

class ReviewsController extends Controller
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
      $reviews = Review::all();
      return view("indexreview", [
        "reviews" => $reviews,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $reviews = Review::all();
        $product_id = $request->get("product_id");

        return view("createreview", [
          "reviews" => $reviews,
          "product_id" => $product_id,
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
      $review = new Review;
      $review->name = $request->get("name");
      $review->grade = $request->get("grade");
      $review->comment = $request->get("comment");
      $review->product_id = $request->get("product_id");
      $review->save();

      return redirect()->action('ReviewsController@index')->with('status', 'Reviewen är sparad!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $review = Review::find($id);

      return view("showreview", [
        "review" => $review
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
      $review = Review::find($id);
      return view("editreview", [
        "review" => $review
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
      $review = Review::find($id);
      $review->name = $request->get("name");
      $review->grade = $request->get("grade");
      $review->comment = $request->get("comment");

      $review->save();

      return redirect()->action('ReviewsController@index')->with('status', 'Reviewen är sparad!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Review::destroy($id);
      return redirect()->action('ReviewsController@index')->with('status', 'Reviewen är raderad!');
    }
}
