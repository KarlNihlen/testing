@extends('master')

@section('content')

<h1>{{ $product->title }}</h1>
<p> Märke: {{ $product->brand }}</p>
<p>
  Pris: {{ $product->price }} kr
</p>
<img src="{{ $product->image }}" alt="{{ $product->title }}">
<p>
  {{ $product->description }}
</p>

<p>
  Finns i {{ $product->stores }}
</p>

<p>
  {{ $product->reviews }}
</p>


@endsection
