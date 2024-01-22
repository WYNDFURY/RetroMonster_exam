<h2 class="text-2xl font-bold mb-4 creepster">User Deck</h2>
@include('monsters._index', [
    'monsters' => \App\Models\Monster::orderBy('created_at', 'DESC')->limit(3)->get(),
])
