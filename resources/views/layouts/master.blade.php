<html>
    <head>
        <title>Beauty Ecommerce</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    </head>
    <body>
    @if(session('success'))
    <div id="message" class="fixed top-2 right-0 z-10">
        <div class="px-10 py-4 bg-blue-600 text-white text-xl">
            <p>{{session('success')}}</p>
        </div>
    </div>
    <script>
        $('#message').delay(1000).slideUp(300);
    </script>
    @endif

    <nav class="flex  top-0 justify-between shadow px-20 py-4 items-center bg-blue-500">
            <img src="{{asset('image/logo.png')}}" class="w-24" alt="">
            <form action="{{route('search')}}" method="GET" class="flex-1 w-full px-10 mt-5 flex items-center gap-4">
                <input type="text" class="w-full block rounded-lg" placeholder="Search any Product" name="search" value="{{request('search')}}" minlength="2" required>
                <button class="bg-blue-600 text-white px-3 py-2 rounded-lg">Search</button>
            </form>
            <div class="text-white font-bold">
                <a class="mx-2 text-white" href="/">Home</a>
                @php
                $categories = \App\Models\Category::orderBy('priority')->get();
                @endphp
                @foreach($categories as $category)
             
                <a class="mx-2 text-white" href="{{route('categoryproduct',$category->id)}}"> {{$category->categoryname}}</a>
                @endforeach

                @auth
                <div class="relative inline-block text-left">
                    <!-- User's Name (Trigger) -->
                    <a class="mx-2 text-white cursor-pointer" href="#">
                        Welcome, {{ auth()->user()->name }}
                    </a>

                    <!-- Dropdown Menu -->
                    <div class="hidden absolute bg-white text-black shadow-lg rounded-md mt-2 w-48 right-0 group-hover:block z-10">
                        <ul class="py-2">
                            <li class="px-4 py-2 hover:bg-gray-200">
                                <a href="{{route('profile.edit')}}" class="block">Manage My Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <a href="{{route('cart')}}" class="mx-2 text-white"><i class="ri-shopping-cart-fill"></i></a>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                <button type="submit"><i class="ri-logout-circle-r-line"></i></button>
                </form>
                @else
                <a class="mx-2 text-white" href="/login">Login</a>
                @endauth

            </div>
        </nav>
        <div class="main-content">
        @yield('content')  <!-- Main content including banner section -->
        </div>

        <footer>
            <div class="bg-blue-800 text-white text-center py-2 ">
                <p>Copyright &copy; 2023. All rights reserved.Beauty Center</p>
            </div>
        </footer>
    </body>
</html>
