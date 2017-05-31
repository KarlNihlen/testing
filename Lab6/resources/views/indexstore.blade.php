@extends('master')
@section('content')

<h1>Alla Stores</h1>
@if (session('status'))
  <div class="alert alert-success" role="alert">{{ session('status') }}</div>
@endif
<p>Här är en lista på stores:</p>
<ul>
  @foreach ($stores as $store)

  <li style="clear:both;"> <a href="stores/{{ $store->id }}">{{ $store->name }}, ({{ $store->city }})
    <form action="stores/{{ $store->id }}" method="post" style="float:right">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
      @if(Auth::check())
        <input type="submit" value="Ta bort store" class="btn btn-danger" style="float:right">
      @endif

    </form>
      <form action="stores/{{ $store->id }}/edit" method="get" style="float:right">
        {{ csrf_field() }}
        @if(Auth::check())
          <input type="submit" value="Edit store" class="btn btn-success" style="float:right">
        @endif
    </form>
  </li>
  @endforeach
</ul>

@endsection
