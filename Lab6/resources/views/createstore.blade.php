@extends('master')
@section('content')

<h1>Lägg till en ny store</h1>

<form action="/stores" method="post">
  {{csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Skriv name här...">
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Skriv city här...">
  </div>

  <input type="submit" value="Spara store" class="btn btn-success">
</form>

@endsection
