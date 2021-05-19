@extends('layouts.app')

@section('content')

<div class="container flex flex-col items-center">
  <span class="text-xl font-bold mb-3">出诊列表</span>
  <div class="text-md text-center m-2 w-full">
    <table class="w-full">
      <thead>
        <tr class="border-solid border-2 border-yellow-300 bg-yellow-200">
          <th class="py-1 px-1 w-1/4 border-solid border-2 border-yellow-300">名字</th>
          <th class="py-1 px-1 w-1/4 border-solid border-2 border-yellow-300">复诊</th>
          <th class="py-1 px-1 border-solid border-2 border-yellow-300">区</th>
          <th class="py-1 px-1 border-solid border-2 border-yellow-300">照顾</th>
          <th class="p-1">查看</th>
        </tr>
      </thead>
      @forelse ($medicals as $medical)
      <tbody>
        <tr class="border-solid border-2">
          <td class="p-1 border-solid border-2">{{ $medical->animal->name }}</td>
          <td class="p-1 border-solid border-2">{{ date('m-d', strtotime($medical->next_visit_date)) }}</td>
          <td class="p-1 border-solid border-2">{{ $medical->animal->area->name }}</td>
          <td class="p-1 border-solid border-2">{{ $medical->animal->take_care_by ?? '-' }}</td>
          <td>
            <a href="{{-- {{ route('animal.info', $medical) }} --}}">
              @if ($medical->animal->type == 'Dog')
                <i class="fas fa-dog px-1 text-yellow-800"></i>
              @elseif ($medical->animal->type == 'Cat')
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
    {{ $medicals->links() }}
  </div>
</div>

@endsection
