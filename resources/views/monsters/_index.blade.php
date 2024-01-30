<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Monster Item -->

@foreach ($monsters as $monster)
        <article
            class="relative bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 monster-card my-8"
            data-monster-type="{{ $monster->type->name }}">
            <img class="w-full h-48 object-cover rounded-t-lg" src="{{ asset('storage/' . $monster->image_url) }}"
                alt="{{ $monster->name }}" />
            <div class="p-4">
                <h3 class="text-xl font-bold">{{ $monster->name }}</h3>
                <h4 class="mb-2">
                    <a 
                    href="{{route('users.show', [
                        'user' => $monster->user->id,
                        'slug' => \Illuminate\Support\Str::slug($monster->user->name)
                    ])}}" 
                    class="text-red-400 hover:underline">{{ $monster->user->name }}</a>
                </h4>

                <p class="text-gray-300 text-sm mb-2">
                    {{ $monster->description }}
                </p>
                <div class="flex justify-between items-center mb-2">
                    <div>
                        <span class="text-yellow-400"> <span
                                class="text-yellow-400">{{ stars($monster->notations->avg('notation')) }}</span></span>
                        <span
                            class="text-gray-300 text-sm">({{ number_format($monster->notations->avg('notation'), 1) }}/5.0)</span>
                    </div>
                    
                </div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-sm text-gray-300">Type: {{ $monster->type->name }}</span>
                    <span class="text-sm text-gray-300">Rareté: {{ $monster->rarity->name }}</span>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-sm text-gray-300">PV: {{ $monster->pv }}</span>
                    <span class="text-sm text-gray-300">Attaque: {{ $monster->attack }}</span>
                    <span class="text-sm text-gray-300">Défense: {{ $monster->defense }}</span>

                </div>
                <div class="flex justify-between items-center mt-4">
                    <div class="text-center">
                        <a href="{{ route('monsters.show', [
                                'monster' => $monster->id,
                                'slug' => \Illuminate\Support\Str::slug($monster->name),
                            ]) }}"
                            class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Plus
                            de détails</a>
                    </div>
                    @if ($monster->user_id === auth()->id())
                        <a href="{{ route('monsters.edit', [
                                'monster' => $monster->id,
                                'slug' => \Illuminate\Support\Str::slug($monster->name)
                            ]) }}"
                            class="text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">
                            Edit
                        </a>
                        <form action="{{ route('monsters.destroy', ['monster' => $monster->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Delete</button>
                        </form>
                    @endif
                </div>    
            </div>
            @include('components.favorites-form', ['monster' => $monster])
        </article>
@endforeach

</div>
