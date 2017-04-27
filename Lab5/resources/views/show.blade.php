@extends('master');
@section('content')

<h1>{{ $product->title }}</h1>
<p>{{ $product->brand }}</p>
<img src="{{ $product->image }}" alt="{{ $product->title }}">

@endsection
