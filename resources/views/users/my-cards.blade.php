@extends('templates.index')

@section('title')
    My Created Monsters
@stop

@section('content')
<h2 class="text-2xl font-bold mb-4 creepster">My Created Monsters</h2>


@include('monsters._index', [
    'monsters' => auth()->user()->monsters()->orderBy('created_at', 'DESC')->get(),
])

@endsection
