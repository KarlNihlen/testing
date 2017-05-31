@extends('master')
@section('content')

<h1>Ändra en review</h1>

<form action="/reviews/{{ $review->id }}" method="post">
  {{ method_field('PUT') }}
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" value= "{{ $review->name }}" name="name" placeholder="">
  </div>
  <div class="form-group">
    <label for="grade">Grade</label>
    <input type="number" class="form-control" id="grade" value= "{{ $review->grade }}" name="grade" placeholder="">
  </div>

  <div class="form-group">
    <label for="comment">Comment</label>
    <input type="text" class="form-control" id="comment" value= "{{ $review->comment }}" name="comment" placeholder="">
  </div>

  <input type="submit" value="Spara review" class="btn btn-success">
</form>

@endsection
