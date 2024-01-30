@extends('templates.index')

@section('title')
    My Deck
@stop

@section('content')
<h2 class="text-2xl font-bold mb-4 creepster">My Deck</h2>


@include('monsters._index', [
    'monsters' => auth()->user()->favorites()->orderBy('created_at', 'DESC')->get(),
])

@endsection
