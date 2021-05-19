@extends('layouts.app')

@section('content')

<div class="container flex flex-col items-center">
  <span class="text-xl font-bold mb-3"> {{ $month }} 列表</span>
  <div class="text-md text-center m-2 w-full">
    <table class="w-full">
      <thead>
        <tr class="border-solid border-2 border-yellow-300 bg-yellow-200">
          <th class="py-1 px-1 w-1/4 border-solid border-2 border-yellow-300">名字</th>
          <th class="py-1 px-1 w-1/4 border-solid border-2 border-yellow-300">预防针</th>
          <th class="py-1 px-1 border-solid border-2 border-yellow-300">区</th>
          <th class="py-1 px-1 border-solid border-2 border-yellow-300">照顾</th>
          <th class="p-1">查看</th>
        </tr>
      </thead>
      @forelse ($animals as $animal)
      <tbody>
        <tr class="border-solid border-2">
          <td class="p-1 border-solid border-2">{{ $animal->name }}</td>
          <td class="p-1 border-solid border-2">{{ date('m-d', strtotime($animal->vacination_date)) }}</td>
          <td class="p-1 border-solid border-2">{{ $animal->area->name }}</td>
          <td class="p-1 border-solid border-2">{{ $animal->take_care_by ?? '-' }}</td>
          <td>
            <a href="{{-- {{ route('setting.updateArea', $area) }} --}}">
              @if ($animal->type == 'Dog')
                <i class="fas fa-dog px-1 text-yellow-800"></i>
              @elseif ($animal->type == 'Cat')
                <i class="fas fa-cat px-1 text-yellow-500"></i>
              @else
                <i class="fas fa-dove px-1 text-yellow-300"></i>
              @endif
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
    {{ $animals->links() }}
  </div>
</div>

@endsection
