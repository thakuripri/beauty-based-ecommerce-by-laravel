@extends('layouts.master')
@section('content')
    <div class="px-32">
        <div class="grid gap-10">
            @foreach ($carts as $cart)
                <div class="bg-gray-100 p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center">
                            <img src="{{asset('images/products/'.$cart->product->photopath)}}" class="h-16" alt="">
                            <p>Product: {{$cart->product->name}}</p>
                            <p>Qty: {{$cart->quantity}}</p>
                            <p>Price: {{$cart->product->price}}</p>
                            <a href="{{route('checkout',$cart->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow ">Order Now</a>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection