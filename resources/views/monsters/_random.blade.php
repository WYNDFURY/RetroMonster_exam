<h2 class="text-2xl font-bold mb-4 creepster">Random Monster</h2>

    @foreach ($monsters as $monster)
    <section class="mb-20">
        <div
            class="bg-gray-700 rounded-lg shadow-lg monster-card"
            data-monster-type="{{ $monster->type }}"
        >
            <div class="md:flex">
                <!-- Image du monstre -->
                <div class="w-full md:w-1/2 relative">
                    <img
                        class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                        src="{{ asset('storage/' . $monster->image_url) }}"
                        alt="{{ $monster->name }}"
                    />
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
                            'slug' => $monster->user->name]) }}" 
                        class="text-red-400"
                        >
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
                    <div class="">
                        <a
                            href="{{ route('monsters.show', ['monster' => $monster->id, 'slug' => Str::slug($monster->name)]) }}"
                            class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300"
                            >Plus de détails</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    @endforeach
