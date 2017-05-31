@extends('master')

@section('content')

<h1>{{ $review->name }}</h1>
<p> Grade: {{ $review->grade }}</p>
<p>
  Comment: {{ $review->comment }}
</p>

@endsection
