          
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label for="name" class="block mb-1">Nom du monstre</label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  class="w-full border rounded px-3 py-2 text-gray-700"
                  placeholder="Nom du monstre"
                  value="{{ isset($monster) ? $monster->name : '' }}"
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
                  value="{{ isset($monster) ? $monster->pv : '' }}"
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
                  value="{{ isset($monster) ? $monster->attack : '' }}"
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
                  value="{{ isset($monster) ? $monster->defense : '' }}"
                />
              </div>
              <div>
                <label for="type_id" class="block mb-1">Type</label>
                <select id="type_id" name="type_id" class="w-full border rounded px-3 py-2 text-gray-700">
                  @php
                      $types = App\Models\MonsterType::all();
                  @endphp
                  @foreach($types->all() as $type)
                    <option value="{{ $type->id }}" {{ isset($monster) && $monster->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
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
                    <option value="{{ $rarity->id }}" {{ isset($monster) && $monster->rarety_id == $rarity->id ? 'selected' : '' }}>{{ $rarity->name }}</option>
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
                >{{ isset($monster) ? $monster->description : '' }}</textarea>
              </div>
              <div>
                <label for="image_url" class="block mb-1">Image</label>
                <input
                  type="file"
                  id="image_url"
                  name="image_url"
                  class="w-full rounded px-3 py-2 text-gray-700"
                  onchange="previewImage(this)"
                />
                @if(isset($monster) && $monster->image_url)
                  <img id="image_preview" src="{{ asset('storage/' . $monster->image_url) }}" alt="Image Preview" style="max-width: 100%; height: auto;">
                @else
                  <img id="image_preview" src="#" alt="Image Preview" style="display: none; max-width: 100%; height: auto;">
                @endif
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
          </form>
