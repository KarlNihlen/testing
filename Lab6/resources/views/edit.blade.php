@extends('master')
@section('content')

<h1>Ändra en produkt</h1>

<form action="/products/{{$product->id}}" method="post">
  {{ method_field('PUT') }}
  {{ csrf_field() }}
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" value= "{{$product->title}}" name="title" placeholder="">
  </div>
  <div class="form-group">
    <label for="brand">Brand</label>
    <input type="text" class="form-control" id="brand" value= "{{$product->brand}}" name="brand" placeholder="">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" value= "{{$product->price}}" name="price" placeholder="">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" value= "{{$product->description}}" name="description" placeholder="">
  </div>
  <div class="form-group">
    <label for="image">Link to image</label>
    <input type="text" class="form-control" id="image" value= "{{$product->image}}" name="image" placeholder="">
  </div>

  <div class="form-group">
    <label for="store">Vilka butiker finns produkten i?</label>
    <br />
    @foreach($stores as $store)
        <div class="checkbox">
          <label><input type="checkbox" name="stores[]" value={{ $store->id }}>{{ $store->name }}</label>
        </div>
    @endforeach
  </div>

  <input type="submit" value="Spara produkt" class="btn btn-success">
</form>

@endsection
