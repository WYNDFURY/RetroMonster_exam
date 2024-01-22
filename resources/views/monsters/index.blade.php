@extends('templates.index')

@section('title')
    List of Monsters
@stop

@section('content')
    @php
        $monsters = \App\Models\Monster::orderBy('created_at', 'DESC')->paginate(9);
    @endphp

    <h2 class="text-2xl font-bold mb-4 creepster">List of Monsters</h2>
    @include('monsters._index', ['monsters' => $monsters])

    <div>{{ $monsters->links() }}</div>
@stop
