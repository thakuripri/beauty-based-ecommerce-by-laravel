@extends('layouts.master')
@section('content')
    <div class="my-10 px-24">
        <h2 class="font-bold text-3xl text-blue-800">Search Results - {{$search}}</h2>
        <hr class="h-1 bg-red-500">
    </div>

    <div class="grid grid-cols-4 gap-10 pb-10 px-24">
        @foreach($products as $product)
        <a href="{{route('viewproduct',$product['id'])}}" class="border p-4 rounded shadow hover:shadow-md hover:-translate-y-1 duration-500">
                <img src="{{asset('images/products/'.$product['photopath'])}}" class="w-full h-64 object-cover" alt="">
                <h2 class="text-xl font-bold my-2">{{$product['name']}}</h2>
                <p class="text-gray-700 line-clamp-2">{{$product['description']}}</p>
                <p class="text-gray-700 font-bold mt-2">Rs {{$product['price']}}</p>
            </a>
        @endforeach
    </div>
@endsection