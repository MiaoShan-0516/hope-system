@extends('layouts.app')

@section('content')
<div class="container flex flex-col flex-wrap text-yellow-900">
  <a href="{{ route('reminder.vaccine') }}">
    <div class="flex flex-col bg-yellow-100 rounded-2xl p-3 mb-2 mx-2 text-xl justify-center items-center border-solid border-2 border-yellow-900">
    <i class="fas fa-syringe fa-3x"></i>
    预防针
    </div>
  </a>
  <a href="{{ route('reminder.clinic') }}">
    <div class="flex flex-col bg-yellow-200 rounded-2xl p-3 mb-2 mx-2 text-xl justify-center items-center border-solid border-2 border-yellow-900">
    <i class="fas fa-ambulance fa-3x"></i>
    看诊
    </div>
  </a>
</div>
@endsection
