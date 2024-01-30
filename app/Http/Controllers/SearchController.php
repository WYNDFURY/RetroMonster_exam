<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use App\Models\MonsterType;
use App\Models\Rarity;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $text = $request->input('texte');

        // Perform the search query based on the monster name
        $monsters = Monster::where('name', 'LIKE', '%' . $text . '%')->get();

        // Return the search results to the view
        return view('monsters.results', ['monsters' => $monsters]);
    }

    public function filter(Request $request)
    {
        $type = $request->input('type');
        $rarity = $request->input('rarity');
        $pvMin = $request->input('min_pv');
        $pvMax = $request->input('max_pv');
        $attackMin = $request->input('min_attaque');
        $attackMax = $request->input('max_attaque');

        $query = Monster::query();
        $typeId = MonsterType::where('name', $type)->value('id');
        $rarityId = Rarity::where('name', $rarity)->value('id'); 

        if ($typeId) {
            $query->where('type_id', $typeId);
        }
        
        if ($rarity) {
            $query->where('rarety_id', $rarityId);
        }

            $query->whereBetween('pv', [$pvMin, $pvMax]);
            $query->whereBetween('attack', [$attackMin, $attackMax]);

        $monsters = $query->get();


        // Return the filtered results to the view
        return view('monsters.results', ['monsters' => $monsters]);
    }
}
