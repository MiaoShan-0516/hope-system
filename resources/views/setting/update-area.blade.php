@extends('layouts.app')

@section('content')

<div class="container flex flex-col justify-center items-center w-full">
  <span class="text-3xl font-bold my-3">修改园区: {{ $area->name }}</span>
  <form class="flex flex-col justify-start" action="{{ route('setting.postUpdateArea', $area) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="flex justify-center items-center text-lg">
      <span class="mx-4">园区名: </span>
      <input type="text" name="area-name" value="{{ $area->name }}" class="w-1/2 p-2 rounded-xl border-b" required>
      @error('area-name')
        <div classs="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="flex w-full my-4 text-md text-white justify-center">
      <button type="Submit" class="w-1/3 py-1.5 bg-submit rounded mr-2.5 bg-blue-500">更新</button>
      <a href="javascript:history.back()" class="w-1/3 py-1.5 ml-2.5 bg-gray-600 text-center rounded">取消</a>
      </div>
  </form>
</div>

@endsection
