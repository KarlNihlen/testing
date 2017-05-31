@extends('master')
@section('content')

<h1>Lägg till en ny review</h1>

<form action="/reviews" method="post">
  {{csrf_field() }}

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Skriv name här...">
  </div>
  <div class="form-group">
    <label for="grade">Grade</label>
    <input type="number" class="form-control" id="grade" name="grade" placeholder="Skriv grade här...">
  </div>
  <div class="form-group">
    <label for="comment">Comment</label>
    <input type="text" class="form-control" id="comment" name="comment" placeholder="Skriv comment här...">
  </div>

  <input type="hidden" class="form-control" id="product_id" name="product_id" value="{{ $product_id }}" placeholder="Add the product id here..." required>

  <input type="submit" value="Send review" class="btn btn-success">
</form>

@endsection
