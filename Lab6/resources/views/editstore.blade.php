@extends('master')
@section('content')

<h1>Ändra en store</h1>

<form action="/stores/{{ $store->id }}" method="post">
  {{ method_field('PUT') }}
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" value= "{{ $store->name }}" name="name" placeholder="">
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" value= "{{ $store->city }}" name="city" placeholder="">
  </div>

  <input type="submit" value="Spara store" class="btn btn-success">
</form>

@endsection
