@extends('layouts.app')

@section('content')

<div class="container ">
  <div class="flex flex-col justify-center items-center border-solid border-2 border-yellow-300 bg-yellow-200">
    <span class="text-3xl font-bold m-2">{{ $animal->name }}</span>
    <span>救援/收留日期: {{ $animal->rescue_date ?? '-'}}</span>
    <span>预防针日期: {{ $animal->vacination_date ?? '-'}}</span>
    <span>结扎日期: {{ $animal->sterilization_date ?? '-'}}</span>
    <span>颜色: {{ $animal->color ?? '-'}}</span>
    <span>区: {{ $animal->area->name ?? '-'}}</span>
    <span>照顾: {{ $animal->take_care_by ?? '-'}}</span>
    <span>救援（1=是，2=否）: {{ $animal->rescue ?? '-'}}</span>
    <span>注意事项: {{ $animal->comment ?? '-'}}</span>
    <div class="flex">
      <div class="flex mt-2 bg-yellow-400 border-solid border-2 border-yellow-500 rounded-xl py-1 px-2 mx-1">
        <a href="{{ route('animal.update', $animal) }}">
          <i class="fas fa-pencil-alt mr-2"></i>更新
        </a>
      </div>
      <div class="flex mt-2 bg-red-500 border-solid border-2 border-red-600 rounded-xl py-1 px-2 mx-1 text-white">
        <form method="post" action="{{ route('animal.postDelete', $animal) }}"> 
          @csrf
          <button type="submit" onclick="return confirm('Are you sure?')" class="">
            <i class="fas fa-times mr-2"></i>删除
          </button>
        </form>
      </div>
    </div>
  </div>
  @if(!is_null($animal->medicalRecords))
  <div class="flex flex-col justify-center items-center border-solid border-2 border-blue-300 bg-blue-200">
    <span class="text-3xl font-bold m-2">医药记录</span>
    @foreach($animal->medicalRecords as $record)
    <span>{{ $loop->index+1 }}</span>
    <span>看诊日期: {{ $record->date ?? '-'}}</span>
    <span>负责: {{ $record->user->name ?? '-'}}</span>
    <span>注意事项: {{ $record->comment ?? '-'}}</span>
    <span>复诊日期: {{ $record->next_visit_date ?? '-'}}</span>
    <div class="flex">
      <div class="flex mt-2 bg-blue-400 border-solid border-2 border-blue-500 rounded-xl py-1 px-2 mx-1">
        <a href="{{ route('medical.update', $record) }}">
          <i class="fas fa-pencil-alt"></i>
        </a>
      </div>
      <div class="flex mt-2 bg-red-500 border-solid border-2 border-red-600 rounded-xl py-1 px-2 mx-1 text-white">
        <form method="post" action="{{ route('medical.postDelete', $record) }}"> 
          @csrf
          <button type="submit" onclick="return confirm('Are you sure?')" class="">
            <i class="fas fa-times"></i>
          </button>
        </form>
      </div>
    </div>
    <br>
    @endforeach
  </div>
  @else
  @endif
</div>

@endsection
