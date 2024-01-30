@extends('templates.index')

@section('title')
    Highlighted card latest cards
@stop

@section('content')
    @include('monsters._random', ['monsters' => [\App\Models\Monster::inRandomOrder()->first()]])
    @include('monsters._latest')
    @auth
        
            @if (auth()->user()->follows->count() > 0)
                @include('monsters._latestFromFollowed')
            @endif
        
    @endauth
@stop
