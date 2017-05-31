@extends('master')
@section('content')

<h1>Alla Reviews</h1>
@if (session('status'))
  <div class="alert alert-success" role="alert">{{ session('status') }}</div>
@endif
<p>Här är en lista på reviews:</p>
<ul>
  @foreach ($reviews as $review)
    @foreach ($products as $product)
      @if($product->id == $review->product_id)


  <li style="clear:both;"><a href="reviews/{{ $review->id }}">{{ $review->name }}, {{ $product->title }}</a>
    <form action="reviews/{{ $review->id }}" method="post" style="float:right">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
      @if(Auth::check())
        <input type="submit" value="Ta bort review" class="btn btn-danger" style="float:right">
      @endif

    </form>
      <form action="reviews/{{ $review->id }}/edit" method="get" style="float:right">
        {{ csrf_field() }}
        @if(Auth::check())
          <input type="submit" value="Edit review" class="btn btn-success" style="float:right">
        @endif
    </form>
  </li>

      @endif
    @endforeach
  @endforeach
</ul>

@endsection
