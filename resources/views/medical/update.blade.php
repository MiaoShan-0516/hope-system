@extends('layouts.app')

@section('content')

<div class="container flex flex-col justify-center items-center w-full">
  <span class="text-3xl font-bold mb-3">更新资料</span>
  <form id="create-animal" class="flex flex-col justify-center items-center mx-3" action="{{ route('medical.postUpdate', $record) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="flex w-1/3 items-center">名字: </span>
      <input type="text" name="" class="w-2/3 p-2" placeholder="{{ $record->animal->name }}" readonly>
      <input type="text" name="animal-id" value="{{ $record->animal_id }}" readonly hidden>
    </div>
    @error('animal-id')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">看诊日期: </span>
      <input type="date" name="visit-date" class="w-2/3 p-2 mx-1" value="{{ $record->date ?? '' }}" required>
    </div>
    @error('visit-date')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">复诊日期: </span>
      <input id="nvd" type="date" name="next-visit-date" class="w-2/3 p-2 mx-1" value="{{ $record->next_visit_date ?? '' }}" >
      <button type="button" onclick="javascript:nvd.value=''">
        <i class="fas fa-redo-alt fa-xs"></i>
      </button>
    </div>
    @error('next-visit-date')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex text-lg mb-1 w-full">
      <span class="w-1/3">留言: </span>
      <textarea rows="5" name="comment" class="w-2/3 p-2" form="create-animal" required>{{ $record->comment }}</textarea>
    </div>
    @error('comment')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror

    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">留言者: </span>
      <input type="text" name="" placeholder="{{ $username->name }}" class="w-2/3 p-2" readonly>
      <input type="text" name="created-by" value="{{ $username->id }}" hidden readonly>
    </div>
    @error('created-by')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror

    <div class="flex w-full my-4 text-md text-white justify-center">
      <button type="Submit" class="w-1/3 py-1.5 bg-submit rounded mr-2.5 bg-blue-500">提交</button>
      <a href="{{ route('medical.index') }}" class="w-1/3 py-1.5 ml-2.5 bg-gray-600 text-center rounded">取消</a>
    </div>
  </form>
  
</div>

@endsection
