@extends('layouts.app')
@section('content')

@if(session('success'))
    <div id="message" class="fixed top-2 right-0">
        <div class="px-10 py-4 bg-green-600 text-white text-xl">
            <p>{{session('success')}}</p>
        </div>
    </div>
    <script>
        $('#message').delay(1000).slideUp(300);
    </script>
@endif


<h2 class="font-bold text-3xl">category</h2>
<hr class=h-1 bg-red-500>
<div class="text-right my-5">
    <a href="{{ route('category.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add category</a>
</div>

<table class="mt-5 w-full text-center">
    <tr>
        <th class="border border-gray-100 p-2 bg-gray-300">order</th>
        <th class="border border-gray-100 p-2 bg-gray-300">category name</th>
        <th class="border border-gray-100 p-2 bg-gray-300">action</th>

    </tr>
    @foreach($categories as $category)
    <tr>
        <td class="border border-gray-300 p-2">{{$category['priority']}}</td>
        <td class="border border-gray-300 p-2">{{$category['categoryname']}}</td>
        <td class="border border-gray-300 p-2">
            <a href="{{route('category.edit',$category['id'])}}"class=" bg-blue-600 text-white px-2 py-1 rounded mx-1">Edit</a>
            <a href="{{route('category.delete',$category['id'])}}" onclick="return confirm('are you sure?');" class=" bg-red-600 text-white px-2 py-1 rounded mx-1">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection