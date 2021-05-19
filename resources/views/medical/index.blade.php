@extends('layouts.app')

@section('content')

<div class="container flex flex-col items-center">
	<span class="text-xl font-bold mb-3">Medical Records</span>
  <div class="flex w-full mb-3 text-lg">
    <form class="flex w-full" action="{{ route('medical.search') }}" method="get" role="search">
      @csrf
      <input class="flex w-full border-solid border-2 border-yellow-400 px-3 py-1" type="text" name="search" placeholder="搜索">
      <button type="submit" class="bg-yellow-500 text-white flex justify-center items-center p-2">
        <i class="fas fa-search fa-md"></i>
      </button>
    </form>
  </div>
  <div class="text-md text-center m-2 w-full">
    <table class="w-full">
      <thead>
        <tr class="border-solid border-2 border-yellow-300 bg-yellow-200">
          <th class="py-1 px-1 w-1/4 border-solid border-2 border-yellow-300">名字</th>
          <th class="py-1 px-1 w-1/4 border-solid border-2 border-yellow-300">预防针</th>
          <th class="py-1 px-1 border-solid border-2 border-yellow-300">区</th>
          <th class="py-1 px-1 border-solid border-2 border-yellow-300">照顾</th>
          <th class="p-1">查看/添加</th>
        </tr>
      </thead>
      @forelse ($results as $result)
      <tbody>
        <tr class="border-solid border-2">
          <td class="p-1 border-solid border-2">{{ $result->name }}</td>
          <td class="p-1 border-solid border-2">{{ date('m-d', strtotime($result->vacination_date)) }}</td>
          <td class="p-1 border-solid border-2">{{ $result->area->name }}</td>
          <td class="p-1 border-solid border-2">{{ $result->take_care_by ?? '-' }}</td>
          <td class="flex justify-center items-center p-1">
            <a>
              @if ($result->hasMedicalRecord())
              <a href="{{ route('animal.info', $result) }}">
                <i class="fas fa-notes-medical px-1 text-yellow-800"></i>
              </a>
              @else
                <i class="fas fa-notes-medical px-1 text-transparent"></i>
              @endif
            </a>
            <a href="{{ route('medical.create', $result) }}">
              <i class="fas fa-plus px-1 text-yellow-600"></i>
            </a>
          </td>
        </tr>
      </tbody>
        
      @empty
      <tr>
        <td>目前无</td>
      </tr>
      @endforelse
    </table>
    {{ $results->links() }}
  </div>
</div>

@endsection
