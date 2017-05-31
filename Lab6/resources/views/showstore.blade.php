@extends('master')

@section('content')

<h1>Namn: {{ $store->name }}</h1>
<p> Stad: {{ $store->city }}</p>

@endsection
