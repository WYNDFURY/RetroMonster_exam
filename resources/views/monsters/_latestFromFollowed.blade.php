<h2 class="text-2xl font-bold mb-4 creepster">Latest Monsters from followed users</h2>
@include('monsters._index', [
    'monsters' => \App\Models\Monster::whereIn('user_id', auth()->user()->follows()->pluck('id'))->orderBy('created_at', 'DESC')->limit(3)->get(),
])