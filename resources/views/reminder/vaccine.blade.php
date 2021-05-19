@extends('layouts.app')

@section('content')
<div class="container flex flex-wrap justify-center text-black">
  @foreach ($months as $month) 
  <a href="{{ route('reminder.month', $month) }}">
    <div class="flex flex-col bg-yellow-{{ ($loop->index)+1 }}00 rounded-2xl py-2 px-7 mb-2 mx-2 justify-center items-center border-solid border-2 border-black">
      <span class="text-3xl font-bold">{{ ($loop->index)+1 }} </span>
      <span class="text-lg">{{ $month }}</span>
    </div>
  </a>
  @endforeach
</div>
@endsection
