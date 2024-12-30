<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex">
            <div class="w-56 bg-gray-100 shadow-lg h-screen">
                 <img src="{{asset('image/logo.png')}}" class="w-8/12 mx-auto mt-5" alt="">
                <div class="mt-5">
                    <a href="{{route('dashboard')}}" class="block px-2 py-3 text-lg boarder-l-4 boarder-blue-600 m-2 hover:bg-gray-300"> Dashboard</a>
                    <a href="{{route('category.index')}}" class="block px-2 py-3 text-lg boarder-l-4 boarder-blue-600 m-2 hover:bg-gray-300"> Category</a>
                    <a href="{{route('product.index')}}" class="block px-2 py-3 text-lg boarder-l-4 boarder-blue-600 m-2 hover:bg-gray-300"> Products</a>
                    <a href="{{route('order.index')}}" class="block px-2 py-3 text-lg boarder-l-4 boarder-blue-600 m-2 hover:bg-gray-300"> Orders</a>
                    <a href="{{route('user.index')}}" class="block px-2 py-3 text-lg boarder-l-4 boarder-blue-600 m-2 hover:bg-gray-300"> Users</a>
                    <form action="{{route('logout')}}" method="post" class="w-full overflow-hidden">
                    @csrf
                    <button type="submit" class="block w-full text-left p-2 py-3 text-lg border-1-4 border-blue-600 mx-2 hover:bg-gray-300">logout</button>

                    </form>
               
               
               
                </div>
            </div>
            <div class="p-4 flex-1">
                @yield('content')
            </div>
        </div>
    </body>
</html>
