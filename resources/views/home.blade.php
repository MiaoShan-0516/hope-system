@extends('layouts.app')

@section('content')
<div class="container flex flex-col flex-wrap text-yellow-900">
  <a href="{{ route('animal.index') }}">
    <div class="flex flex-col bg-yellow-100 rounded-2xl p-3 mb-2 mx-2 text-xl justify-center items-center border-solid border-2 border-yellow-900">
    <i class="fas fa-paw fa-3x"></i>
    动物资料
    </div>
  </a>
  <a href="{{ route('medical.index') }}">
    <div class="flex flex-col bg-yellow-200 rounded-2xl p-3 mb-2 mx-2 text-xl justify-center items-center border-solid border-2 border-yellow-900">
    <i class="fas fa-notes-medical fa-3x"></i>
    看诊记录
    </div>
  </a>
  <a href="{{ route('area.index') }}">
    <div class="flex flex-col bg-yellow-300 rounded-2xl p-3 mb-2 mx-2 text-xl justify-center items-center border-solid border-2 border-yellow-900">
    <i class="fas fa-map-signs fa-3x"></i>
    园区
    </div>
  </a>
  <a href="{{ route('reminder.index') }}">
    <div class="flex flex-col bg-yellow-400 rounded-2xl p-3 mb-2 mx-2 text-xl justify-center items-center border-solid border-2 border-yellow-900">
    <i class="fas fa-bell fa-3x"></i>
    提醒
    </div>
  </a>
</div>
@endsection
