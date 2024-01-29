@extends('templates.index')

@section('title')
    List of Users
@stop

@section('content')
<h2 class="text-2xl font-bold mb-4 creepster">My Deck</h2>


@include('monsters._index', [
    'monsters' => auth()->user()->monsters()->orderBy('created_at', 'DESC')->get(),
])

@endsection
