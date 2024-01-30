@extends('templates.index')

@section('title')
    Search Results
@stop

@section('content')
    <h2 class="text-2xl font-bold mb-4 creepster">Search Results</h2>
    @include('monsters._index', ['monsters' => $monsters])
@stop
