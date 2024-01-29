@extends('templates.index')

@section('title')
  Edit Monster
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
<form method="POST" enctype="multipart/form-data" action="{{route('monsters.update')}}" class="space-y-6">
  @csrf
  <div class="container mx-auto pb-12">
    <div class="flex flex-wrap justify-center">
      <div class="w-full">
        <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold mb-4 text-center creepster">
            Modifier un monstre
          </h2>
          @include('monsters._form')
          <div class="flex justify-between items-center">
            <button
              type="submit"
              class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
              Modifier le monstre
            </button>
            <a href="#" class="text-red-400 hover:text-red-500">Annuler</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop