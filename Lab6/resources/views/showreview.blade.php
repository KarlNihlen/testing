@extends('master')

@section('content')

<h1>{{ $review->name }}</h1>
<p> Grade: {{ $review->grade }}</p>
<p>
  Comment: {{ $review->comment }}
</p>

<p>
  This comment belongs to this product: {{ $product_title }}
</p>

@endsection
