@extends('layouts.app')

@section('content')

<div class="container flex flex-col justify-center items-center w-full">
  <span class="text-3xl font-bold my-3">添加新园区</span>
  <form class="flex flex-col justify-start" action="{{ route('setting.createArea') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="flex justify-center items-center text-lg">
      <span class="mx-4">园区名: </span>
      <input type="text" name="area-name" placeholder="A / B / C / D / ..." class="w-1/2 p-2 rounded-xl border-b" required>
    </div>
      @error('area-name')
        <div classs="invalid-feedback">{{ $message }}</div>
      @enderror
    <div class="flex w-full my-4 text-md text-white justify-center">
      <button type="Submit" class="w-1/3 py-1.5 bg-submit rounded mr-2.5 bg-blue-500">提交</button>
      <a href="{{ route('setting.index') }}" class="w-1/3 py-1.5 ml-2.5 bg-gray-600 text-center rounded">取消</a>
      </div>
  </form>
  <hr class="w-full mb-4">
  <div class="text-lg text-center">
    <table>
      <thead>
        <tr class="border-solid border-yellow-300 border-2 bg-yellow-200">
          <th class="py-2 px-8">园区名</th>
          <th class="p-2"></th>
        </tr>
      </thead>
      @forelse ($areas as $area)
      <tbody>
        <tr class="border-solid border-2 border-yellow-300">
          <td class="p-2">{{$area->name}}</td>
          <td class="flex p-2">
            <a href="{{ route('setting.updateArea', $area) }}">
              <i class="fas fa-pencil-alt px-1 text-yellow-800"></i>
            </a>
            <form action="{{ route('setting.deleteArea', $area) }}" method="post">
              @csrf
            <button type="Submit" onclick="return confirm('确定删除?')"  href="{{ route('setting.deleteArea', $area) }}">
              <i class="fas fa-times px-1 text-red-500"></i>
            </button>
            </form>
          </td>
        </tr>
      </tbody>
        
      @empty
      <tr>
        <td colspan="3">目前无园区</td>
      </tr>
      @endforelse
    </table>
    {{ $areas->links() }}
  </div>
  
</div>

@endsection
