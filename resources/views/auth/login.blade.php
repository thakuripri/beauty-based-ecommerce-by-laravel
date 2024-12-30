@extends('layouts.master')
@section('content')
    <div class="flex justify-center items-center  bg-cyan-100">

        <form action="{{route('login')}}" method="post" class="w-1/3 border p-10 rounded shadow">
            <h1 class="text-4xl font-bold text-center my-5">Login</h1>

            @csrf
            <div class="mb-5">
                <input type="email" name="email" placeholder="Enter Email" class="w-full p-2 border rounded">
                @error('email')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <input type="password" name="password" placeholder="Enter Password" class="w-full p-2 border rounded">
                @error('password')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="my-3 text-right text-blue-600">
                <a href="{{route('password.request')}}">Forgot Password?</a>
            </div>
            <div class="mb-5">
                <button type="submit" class="w-full bg-blue-700 text-white p-2 rounded">Login</button>
            </div>
            <div class="text-center">
                <p>Don't have an account? <a href="{{route('register')}}" class="text-blue-600">Register</a></p>
            </div>
        </form>
    </div>
@endsection