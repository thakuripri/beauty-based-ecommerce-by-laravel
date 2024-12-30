@extends('layouts.master')
@section('content')
    <div class="flex justify-center items-center  bg-cyan-100">
        <form action="{{route('register')}}" method="post" class="w-1/3 border p-10 rounded shadow">
            <h1 class="text-4xl font-bold text-center my-5">Register</h1>

            @csrf
            <!-- Name -->
            <div class="mb-5">
                <input type="text" name="name" placeholder="Enter Full Name" class="w-full p-2 border rounded">
                @error('name')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Email Input -->
    <div class="mb-5">
        <input type="email" name="email" placeholder="Enter Email" class="w-full p-2 border rounded" 
            pattern="^[a-zA-Z]+[a-zA-Z._%+-]*@[a-zA-Z.-]+\.[a-zA-Z]{2,}$
" 
            title="Please enter a valid email address" required>
        @error('email')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

            <div class="mb-5">
                <input type="password" name="password" placeholder="Enter Password" class="w-full p-2 border rounded">
                @error('password')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border rounded">
                @error('password_confirmation')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <button type="submit" class="w-full bg-blue-700 text-white p-2 rounded">Register</button>
            </div>
            <div class="text-center">
                <p>Already have an account? <a href="{{route('login')}}" class="text-blue-600">Login</a></p>
            </div>
        </form>
    </div>
@endsection


