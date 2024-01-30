@extends('templates.index')

@section('title')
    {{ $monster->name }}
@stop

@section('content')
    <div class="container mx-auto flex flex-wrap pb-12">
        <!-- Page de détail du monstre -->
        <section class="w-full">
            <section class="mb-20">
                <div class="bg-gray-700 rounded-lg shadow-lg monster-card" data-monster-type="{{ $monster->type->name }}">
                    <div class="md:flex">
                        <!-- Image du monstre -->
                        <div class="w-full md:w-1/2 relative">
                            <img class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                                src="{{ asset('storage/' . $monster->image_url) }}" alt="{{ $monster->name }}" />
                                @include('components.favorites-form', ['monster' => $monster])
                        </div>

                        <!-- Détails du monstre -->
                        <div class="p-6 md:w-1/2">
                            <h2 class="text-3xl font-bold mb-2 creepster">
                                {{ $monster->name }}
                            </h2>
                            <p class="text-gray-300 text-sm mb-4">
                                {{ $monster->description }}
                            </p>
                            <div class="mb-4">
                                <strong class="text-white">Créateur:</strong>
                                <a href="{{ route('users.show', [
                                    'user' => $monster->user->id,
                                    'slug' => $monster->user->name,
                                ]) }}"
                                    class="text-red-400">
                                    {{ $monster->user->name }}
                                </a>
                            </div>
                            <div class="mb-4">
                                <div>
                                    <strong class="text-white">Type:</strong>
                                    <span class="text-gray-300">{{ $monster->type->name }}</span>
                                </div>
                                <div>
                                    <strong class="text-white">Rareté:</strong>
                                    <span class="text-gray-300">{{ $monster->rarity->name }}</span>
                                </div>
                                <div>
                                    <strong class="text-white">PV:</strong>
                                    <span class="text-gray-300">{{ $monster->pv }}</span>
                                </div>
                                <div>
                                    <strong class="text-white">Attaque:</strong>
                                    <span class="text-gray-300">{{ $monster->attack }}</span>
                                </div>
                                <div>
                                    <strong class="text-white">Défense:</strong>
                                    <span class="text-gray-300">{{ $monster->defense }}</span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <span class="text-yellow-400">{{ stars($monster->notations->avg('notation')) }}</span>
                                <span
                                    class="text-gray-300 text-sm">({{ number_format($monster->notations->avg('notation'), 1) }}/5.0)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section d'évaluation -->
            @include('components.rating', ['monster' => $monster])

            <!-- Section commentaires -->
            <div class="mt-6">
                <h3 class="text-2xl font-bold mb-4">Commentaires</h3>
                <div id="commentaires-section">
                    @foreach ($monster->comments as $comment)
                        <div class="mb-4 bg-gray-800 rounded p-4">
                            <p class="font-bold text-red-400">{{ $comment->user->name }}</p>
                            <p class="text-sm text-gray-400">{{ $comment->created_at->format('d/m/Y') }}</p>
                            <p class="text-gray-300 mt-2">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Formulaire de commentaire -->
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <div class="bg-gray-800 rounded p-4">
                    <h4 class="font-bold text-lg text-red-500 mb-2">
                        Laissez un commentaire
                    </h4>
                    <textarea name="content" class="w-full p-2 bg-gray-900 rounded text-gray-300" rows="4"
                        placeholder="Votre commentaire..."></textarea>
                    <input type="hidden" name="monster_id" value="{{ $monster->id }}">
                    <button type="submit"
                        class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full w-full">
                        Envoyer
                    </button>
                </div>
            </form>
    </div>
    </section>
    </div>
@stop
