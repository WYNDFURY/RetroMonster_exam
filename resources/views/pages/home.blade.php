@extends('templates.index')

@section('title')
    Highlighted card latest cards
@stop

@section('content')
    @include('monsters._random')
    @include('monsters._latest')
@stop
