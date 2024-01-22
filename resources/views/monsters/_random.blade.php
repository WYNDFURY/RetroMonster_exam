<h2 class="text-2xl font-bold mb-4 creepster">Random Monster</h2>
@include('monsters._index', [
    'monsters' => [\App\Models\Monster::inRandomOrder()->first()],
])
