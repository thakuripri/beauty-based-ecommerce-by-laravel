@extends('layouts.app')
@section('content')
<h1 class="font-bold text-3xl text-blue-50">Users</h1>
<hr class="h-1 bg-red-500">
    <table class="w-full">
        <tr>
            <th class="border p-2">S.N</th>
            <th class="border p-2">Name</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr class="text-center">
            <th class="border p-2">{{$loop->iteration}}</th>
            <th class="border p-2">{{$user->Name}}</th>
            <th class="border p-2">{{$user->Email}}</th>
            <th class="border p-2">
            <a href=""class=" bg-blue-600 text-white px-2 py-1 rounded mx-1">Edit</a>
            <a href="" class=" bg-red-600 text-white px-2 py-1 rounded mx-1">Delete</a>
        
            </th>
        </tr>
        @endforeach
    </table>

@endsection