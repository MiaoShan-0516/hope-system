@extends('layouts.app')

@section('content')

<div class="container flex flex-col items-center">
	<span class="text-xl font-bold mb-3">猫猫资料</span>
  <div class="flex w-full">
    <div class="flex w-full space-x-3 m-2">
      <a href="{{ route('animal.index') }}" class="">
        <i class="fas fa-paw fa-2x bg-yellow-900 text-white p-2 rounded-xl"></i>
      </a>
      <a href="{{ route('animal.dog') }}" class="">
        <i class="fas fa-dog fa-2x bg-yellow-800 text-white p-2 rounded-xl"></i>
      </a>
      <a href="{{ route('animal.cat') }}">
        <i class="fas fa-cat fa-2x bg-yellow-700 text-white p-2 rounded-xl"></i>
      </a>
      <a href="{{ route('animal.other') }}">
        <i class="fas fa-dove fa-2x bg-yellow-600 text-white p-2 rounded-xl"></i>
      </a>
    </div>
    <div class="flex justify-end m-2">
      <a href="{{ route('animal.create') }}">
        <i class="fas fa-plus fa-2x m-auto bg-yellow-500 text-white p-2 rounded-xl"></i>
      </a>
    </div>
  </div>
  <div class="text-md text-center m-2 w-full">
    <table class="w-full">
      <thead>
        <tr class="border-solid border-2 border-yellow-300 bg-yellow-200">
          <th class="py-1 px-1 w-1/4 border-solid border-2 border-yellow-300">名字</th>
          <th class="py-1 px-1 w-1/4 border-solid border-2 border-yellow-300">预防针</th>
          <th class="py-1 px-1 border-solid border-2 border-yellow-300">区</th>
          <th class="py-1 px-1 border-solid border-2 border-yellow-300">照顾</th>
          <th class="p-1">查看  </th>
        </tr>
      </thead>
      @forelse ($cats as $cat)
      <tbody>
        <tr class="border-solid border-2">
          <td class="p-1 border-solid border-2">{{ $cat->name }}</td>
          <td class="p-1 border-solid border-2">{{ date('m-d', strtotime($cat->vacination_date)) }}</td>
          <td class="p-1 border-solid border-2">{{ $cat->area->name }}</td>
          <td class="p-1 border-solid border-2">{{ $cat->take_care_by ?? '-' }}</td>
          <td>
            <a href="{{ route('animal.info', $cat) }}">
              <i class="fas fa-cat px-1 text-yellow-500"></i>
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
    {{ $cats->links() }}
  </div>
</div>

@endsection
