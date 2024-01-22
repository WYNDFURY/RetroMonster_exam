@extends('templates.index')

@section('title')
    {{ $user->username }}
@stop

@section('content')
    <div class="container mx-auto flex flex-wrap pb-12">
        <!-- Page de détail du monstre -->
        <section class="w-full">
            <section class="mb-20">
                <h2 class="text-4xl font-bold creepster text-center mb-8">
                    Profil de {{$user->username}} 
                </h2>
                <div class="bg-gray-700 rounded-lg shadow-lg">
                    <div class="md:flex">
                        <!-- Image du monstre -->
                        <div class="w-full md:w-1/2 relative">
                            <img class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                                src="https://placebeard.it/640/480" alt="{{ $user->username }}" />
                            <div class="absolute top-4 right-4">
                                <button
                                    class="text-white bg-gray-400 hover:bg-red-700 rounded-full p-2 transition-colors duration-300"
                                    style="
                                            width: 40px;
                                            height: 40px;
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;
                                            ">
                                    <i class="fa fa-bookmark"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-6 md:w-1/2">
                            <h2 class="text-3xl font-bold mb-2 creepster">
                                {{ $user->username }}
                            </h2>
                            <div class="mb-4">
                                <div>
                                    <strong class="text-white text-2xl">E-mail:</strong>
                                    <span class="text-gray-300 text-xl">{{ $user->email }}</span>
                                </div>
                                <div>
                                    <strong class="text-white text-2xl">Profil créé:</strong>
                                    <span class="text-gray-300 text-xl">{{ $user->created_at->format('d/m/Y') }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>

    <h2 class="text-4xl font-bold creepster text-center mb-8">
        Deck de {{$user->username}} 
    </h2>
    
    @php
        $monsters = $user->favorites
    @endphp
    @include('monsters._index', ['monsters' => $monsters])
            

@stop
