@extends('master');
@section('content')

<h1>Alla Produkter</h1>
@if (session('status'))
  <div class="alert alert-success" role="alert">{{ session('status') }}</div>
@endif
<p>Här är en lista på produkter:</p>
<ul>
  @foreach ($products as $product)
      {{$product->title}}

  <li style="clear:both;"><a href="products/{{ $product->id }}">{{ $product->title }}</a> ({{ $product->brand }})
    <form action="products/{{ $product->id }}" method="post" style="float:right">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
      <input type="submit" value="Ta bort produkt" class="btn btn-danger" style="float:right">
    </form>
  </li>
  @endforeach
</ul>

@endsection
