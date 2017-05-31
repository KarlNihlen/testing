@extends('master')
@section('content')

<h1>Lägg till en ny produkt</h1>

<form action="/products" method="post">
  {{csrf_field() }}
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Skriv titel här...">
  </div>
  <div class="form-group">
    <label for="brand">Brand</label>
    <input type="text" class="form-control" id="brand" name="brand" placeholder="Skriv brand här...">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="Skriv pris här...">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Skriv beskrivning här...">
  </div>
  <div class="form-group">
    <label for="image">Link to image</label>
    <input type="text" class="form-control" id="image" name="image" placeholder="länka bild här...">
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
