@extends('layouts.app')

@section('content')

<div class="container flex flex-col justify-center items-center w-full">
  <span class="text-3xl font-bold mb-3">更新资料</span>
  <form id="create-animal" class="flex flex-col justify-center items-center mx-3" action="{{ route('animal.postUpdate', $animal) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="flex w-1/3 items-center">名字: </span>
      <input type="text" name="animal-name" value="{{ $animal->name }}" class="w-2/3 p-2" required>
    </div>
    @error('animal-name')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">种类: </span>
      <select name="types" id="type" class="w-2/3 p-2 bg-white" required>
        <option value="Dog" @if($animal->type=='Dog')selected @endif>狗狗</option>
        <option value="Cat" @if($animal->type=='Cat')selected @endif >猫猫</option>
        <option value="Other" @if($animal->type=='Other')selected @endif>其他</option>
      </select>
    </div>
    @error('types')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">颜色: </span>
      <input type="text" name="color" class="w-2/3 p-2" value="{{ $animal->color ?? '' }}">
    </div>
    @error('color')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">救援/收留日期: </span>
      <input id="rd" type="date" name="rescue-date" class="w-2/3 p-2 mx-1" value="{{ $animal->rescue_date ?? '' }}">
      <button type="button" onclick="javascript:rd.value=''">
        <i class="fas fa-redo-alt fa-xs"></i>
      </button>
    </div>
    @error('rescue-date')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">预防针日期: </span>
      <input id="vd" type="date" name="vacination-date" class="w-2/3 p-2 mx-1" value="{{ $animal->vacination_date ?? '' }}">
      <button type="button" onclick="javascript:vd.value=''">
        <i class="fas fa-redo-alt fa-xs"></i>
      </button>
    </div>
    @error('vacination-date')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">结扎日期: </span>
      <input id="sd" type="date" name="sterilization-date" class="w-2/3 p-2 mx-1" value="{{ $animal->sterilization_date ?? '' }}">
      <button type="button" onclick="javascript:sd.value=''">
        <i class="fas fa-redo-alt fa-xs"></i>
      </button>
    </div>
    @error('sterilization-date')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">区: </span>
      <select name="areas" id="area" class="w-2/3 p-2 bg-white" required>
        @foreach($areas as $area)
          <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endforeach
      </select>
    </div>
    @error('areas')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror

    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">照顾: </span>
      <input type="text" name="take-care-by" placeholder="照顾者/员工" class="w-2/3 p-2" value="{{ $animal->take_care_by ?? '' }}">
    </div>
    @error('take-care-by')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex items-center text-lg mb-1 w-full">
      <span class="w-1/3">救援? </span>
      <input type="radio" name="rescue" value="1" class="p-2 mr-2" @if($animal->rescue==1) checked @endif>是
      <input type="radio" name="rescue" value="0" class="p-2 mx-2" @if($animal->rescue==0) checked @endif>否
    </div>
    @error('rescue')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex text-lg mb-1 w-full">
      <span class="w-1/3">注意事项: </span>
      <textarea rows="3" name="comment" class="w-2/3 p-2" form="create-animal">{{ $animal->comment ?? '' }}</textarea>
    </div>
    @error('comment')
      <div classs="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="flex w-full my-4 text-md text-white justify-center">
      <button type="Submit" class="w-1/3 py-1.5 bg-submit rounded mr-2.5 bg-blue-500">提交</button>
      <a href="{{ route('animal.index') }}" class="w-1/3 py-1.5 ml-2.5 bg-gray-600 text-center rounded">取消</a>
    </div>
  </form>
  
</div>

@endsection
