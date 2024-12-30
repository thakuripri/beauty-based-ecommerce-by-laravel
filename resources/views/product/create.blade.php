@extends('layouts.app')
@section('content')
    <h1 class="text-3xl font-bold text-blue-800">Add Product</h1>
    <hr class="h-1 bg-red-500">

    <form action="{{route('product.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        <select name="category_id" id="" class="block w-full p-2 rounded my-2">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->categoryname}}</option>
            @endforeach
        </select>
        <input type="text" placeholder="Enter Product Name" name="name" value="{{old('name')}}" class="block w-full p-2 rounded my-2">
        @error('name')
            <div class="text-red-600 -mt-5">
                {{ $message }}
            </div>
        @enderror
        <input type="text" placeholder="Enter Product Description" name="description" value="{{old('description')}}" class="block w-full p-2 rounded my-2">
        @error('description')
            <div class="text-red-600 -mt-5">
                {{ $message }}
            </div>
        @enderror
        <input type="text" placeholder="Enter Product price" name="price" value="{{old('price')}}" class="block w-full p-2 rounded my-2">
        @error('price')
            <div class="text-red-600 -mt-5">
                {{ $message }}
            </div>
        @enderror
        <input type="text" placeholder="Enter Product stock" name="stock" value="{{old('stock')}}" class="block w-full p-2 rounded my-2">
        @error('stock')
            <div class="text-red-600 -mt-5">
                {{ $message }}
            </div>
        @enderror
        <select name="status" class="block w-full p-2 rounded my-2">
            <option value="Available">Available</option>
            <option value="Unavailable">Unavailable</option>
        </select>
        <input type="file" name="photopath" class="block w-full p-2 rounded my-2">
        @error('photopath')
            <div class="text-red-600 -mt-5">
                {{ $message }}
            </div>
        @enderror
        <div class="flex justify-center gap-5">
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Add Product</button>
        <a href="{{route('product.index')}}" class="bg-red-600 text-white py-2 px-8 rounded">Cancel</a>
        </div>
    </form>
@endsection

