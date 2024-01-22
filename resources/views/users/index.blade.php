@extends('templates.index')

@section('title')
    List of Users
@stop

@section('content')
    @php
        $users = \App\Models\User::orderBy('created_at', 'DESC')->paginate(9);
    @endphp

    <h2 class="text-2xl font-bold mb-4 creepster">List of Users</h2>
    @include('users._index', ['users' => $users])

    <div>{{ $users->links() }}</div>
@stop
