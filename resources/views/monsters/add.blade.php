@extends('templates.index')

@section('title')
  Add Monster
@stop

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="container mx-auto pb-12">
    <div class="flex flex-wrap justify-center">
      <div class="w-full">
        <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold mb-4 text-center creepster">
            Ajouter un nouveau monstre
          </h2>
          <form method="POST" enctype="multipart/form-data" action="{{route('monsters.store')}}" class="space-y-6">
            @csrf
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label for="name" class="block mb-1">Nom du monstre</label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  class="w-full border rounded px-3 py-2 text-gray-700"
                  placeholder="Nom du monstre"
                />
              </div>
              <div>
                <label for="pv" class="block mb-1">HP</label>
                <input
                  type="number"
                  id="pv"
                  name="pv"
                  class="w-full border rounded px-3 py-2 text-gray-700"
                  placeholder="HP du monstre"
                />
              </div>
              <div>
                <label for="attack" class="block mb-1">Attack</label>
                <input
                  type="number"
                  id="attack"
                  name="attack"
                  class="w-full border rounded px-3 py-2 text-gray-700"
                  placeholder="Attack du monstre"
                />
              </div>
              <div>
                <label for="defense" class="block mb-1">Défense</label>
                <input
                  type="number"
                  id="defense"
                  name="defense"
                  class="w-full border rounded px-3 py-2 text-gray-700"
                  placeholder="Défense du monstre"
                />
              </div>
              <div>
                <label for="type_id" class="block mb-1">Type</label>
                <select id="type_id" name="type_id" class="w-full border rounded px-3 py-2 text-gray-700">
                  @php
                      $types = App\Models\MonsterType::all();
                  @endphp
                  @foreach($types->all() as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                  @endforeach
                </select>
              </div>
              <div>
                <label for="rarety_id" class="block mb-1">Rarity</label>
                <select id="rarety_id" name="rarety_id" class="w-full border rounded px-3 py-2 text-gray-700">
                  @php
                      $rarities = App\Models\Rarity::all();
                  @endphp
                  @foreach($rarities->all() as $rarity)
                    <option value="{{ $rarity->id }}">{{ $rarity->name }}</option>
                  @endforeach
                </select>
              </div>
              <div>
                <label for="description" class="block mb-1">Description</label>
                <textarea
                  id="description"
                  name="description"
                  class="w-full border rounded px-3 py-2 text-gray-700"
                  placeholder="Description du monstre"
                  rows="4"
                ></textarea>
              </div>
              <div>
                <label for="image_url" class="block mb-1">Image</label>
                <input
                  type="file"
                  id="image_url"
                  name="image_url"
                  class="w-full border rounded px-3 py-2 text-gray-700"
                  onchange="previewImage(this)"
                />
                <img id="image_preview" src="#" alt="Image Preview" style="display: none; max-width: 100%; height: auto;">
              </div>

              <script>
                function previewImage(input) {
                  if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                      document.getElementById('image_preview').src = e.target.result;
                      document.getElementById('image_preview').style.display = 'block';
                    }

                    reader.readAsDataURL(input.files[0]);
                  }
                }
              </script>
            </div>
            <div class="flex justify-between items-center">
              <button
                type="submit"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
              >
                Ajouter le monstre
              </button>
              <a href="#" class="text-red-400 hover:text-red-500">Annuler</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop
