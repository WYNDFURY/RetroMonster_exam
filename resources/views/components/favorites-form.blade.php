<div class="absolute top-4 right-4">
  <form 
  action="{{ 
      in_array(
      $monster->id, auth()->user()->favorites->pluck('id')->toArray()) 
      ? route('users.remove-favorite', ['monsterId' => $monster->id]) 
      : route('users.add-favorite', ['monsterId' => $monster->id]) 
  }}" 
  method="POST">
      @csrf
      @if(in_array($monster->id, auth()->user()->favorites->pluck('id')->toArray()))
          @method('DELETE')
          <button type="submit" class="text-white bg-red-400 hover:bg-gray-400 rounded-full p-2 transition-colors duration-300"
              style="
                      width: 40px;
                      height: 40px;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      ">
              <i class="fa fa-bookmark"></i>
          </button>
      @else
          <button type="submit" class="text-white bg-gray-400 hover:bg-red-700 rounded-full p-2 transition-colors duration-300"
              style="
                      width: 40px;
                      height: 40px;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      ">
              <i class="fa fa-bookmark"></i>
          </button>
      @endif
      </form>
  </div>