@extends('layouts.app')

@section('content')

<div class="container">
  <div class="flex flex-col justify-center items-center w-full text-yellow-900">
    <span class="text-center font-bold text-xl text-black">系统设置</span>
    <a href="{{ route('setting.area') }}" class="flex flex-col justify-center items-center border-solid border-2 border-yellow-900 bg-yellow-300 rounded-xl w-3/4 p-3 m-2">
      <i class="fas fa-map-signs fa-3x mb-2"></i>
      园区管理
    </a>
  </div>
</div>

@endsection
