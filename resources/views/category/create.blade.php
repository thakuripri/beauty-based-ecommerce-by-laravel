@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-3xl text-blue-800">Create Category</h2>
    <hr class="h-1 bg-red-600">

    <form action="{{route('category.store')}}" method="post">
     @csrf  
    <input type="text" name="categoryname" placeholder="Category Name"class=" block w-full rounded border-gray-300 my-4" value="{{old('categoryname')}}">
    @error('categoryname')
        <div class="text-red-500 -mt-5">
          {{$message}}
        </div> 
    @enderror
    <input type="text" name="priority" placeholder="Priority"class=" block w-full rounded border-gray-300 my-4" value="{{old('priority')}}">
    @error('priority')
        <div class="text-red-500 -mt-5">
          {{$message}}
        </div>
    @enderror 
    <div class="flex justify-center">
        <input type="submit" value="Add category " class=" bg-blue-600 text-white px-2 py-1 rounded mx-2">
        <a href="{{route('category.index') }}"class="bg-red-600 text-white px-12 py-1 rounded mx-2">Exit</a>
    </div>
  </form>
@endsection