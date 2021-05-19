@extends('layouts.app')

@section('content')

<div class="container">
  <span class="flex justify-center text-center font-bold text-2xl text-black m-2">园区</span>
  <div class="flex flex-wrap justify-center items-center text-yellow-900">
  @foreach($areas as $area)
    <a href="{{ route('area.list', $area) }}" class="flex flex-col justify-center items-center border-solid border-2 border-yellow-900 bg-yellow-300 rounded-xl p-3 m-2 text-xl font-bold">
      <i class="fas fa-map-signs fa-3x mb-2"></i>
      {{ $area->name }}
    </a>
  @endforeach
  </div>
</div>

@endsection

