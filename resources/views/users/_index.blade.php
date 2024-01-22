<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Monster Item -->

    @foreach ($users as $user)
        <article
            class="relative bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 monster-card">
            <img class="w-full h-48 object-cover rounded-t-lg" src="https://placebeard.it/640/480"
                alt="{{ $user->username }}" />
            <div class="p-4">
                <h3 class="text-xl font-bold">{{ $user->username }}</h3>
                <div class="text-center">
                    <a href="{{ route('users.show', [
                        'user' => $user->id,
                        'slug' => \Illuminate\Support\Str::slug($user->username),
                    ]) }}"
                        class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Plus
                        de détails</a>
                </div>
            </div>
            <div class="absolute top-4 right-4">
                <button class="text-white bg-gray-400 hover:bg-red-700 rounded-full p-2 transition-colors duration-300"
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
        </article>
    @endforeach

</div>
