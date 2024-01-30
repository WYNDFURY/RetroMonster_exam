<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;

class MonsterController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pv' => 'required',
            'attack' => 'required',
            'defense' => 'required',
            'type_id' => 'required',
            'rarety_id' => 'required',
            'description' => 'required',
            'image_url' => 'image',
        ]);

        $monster = new Monster;
        $monster->name = $request->name;
        $monster->pv = $request->pv;
        $monster->attack = $request->attack;
        $monster->defense = $request->defense;
        $monster->type_id = $request->type_id;
        $monster->rarety_id = $request->rarety_id;
        $monster->description = $request->description;
        $monster->user_id = auth()->user()->id;

        if ($request->hasFile('image_url')) {
            if ($request->file('image_url')->isValid()) {
                $imagePath = $request->file('image_url')->store('images', 'public');
                $monster->image_url = $imagePath;
            }
        }



        $monster->save();

        return redirect()->route('users.my-cards')->with('success', 'Monster has been added successfully');
    }


    public function update(Request $request)
    {
        $monster = Monster::findOrFail($request->id);

        if (auth()->user()->id !== $monster->user_id) {
            return redirect()->route('monsters.index')->with('error', 'You are not authorized to update this monster.');
        }

        $request->validate([
            'name' => 'required',
            'pv' => 'required',
            'attack' => 'required',
            'defense' => 'required',
            'type_id' => 'required',
            'rarety_id' => 'required',
            'description' => 'required',
            'image_url' => 'image',
        ]);

        $monster->name = $request->name;
        $monster->pv = $request->pv;
        $monster->attack = $request->attack;
        $monster->defense = $request->defense;
        $monster->type_id = $request->type_id;
        $monster->rarety_id = $request->rarety_id;
        $monster->description = $request->description;
        $monster->user_id = auth()->user()->id;

        if ($request->hasFile('image_url')) {
            if ($request->file('image_url')->isValid()) {
                $imagePath = $request->file('image_url')->store('images', 'public');
                $monster->image_url = $imagePath;
            }
        }

        $monster->save();

        return redirect()->route('users.my-cards')->with('success', 'Monster has been added successfully');
    }


    public function destroy(string $id)
    {
        $monster = Monster::findOrFail($id);

        if (auth()->user()->id !== $monster->user_id) {
            return redirect()->route('monsters.index')->with('error', 'You are not authorized to delete this monster.');
        }

        $monster->delete();

        return redirect()->route('users.my-cards')->with('success', 'Monster has been deleted successfully');
    }
}
