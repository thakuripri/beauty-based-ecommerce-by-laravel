@extends('layouts.master')
@section('content')
<div class="px-24 my-10 grid grid-cols-2 grind-col-3 gap-10">
    <div class="left">
        <img src="{{asset('images/products/'.$product->photopath)}}" class="w-50% h-50 object-half" alt="">
    </div>
    <div class="right">
        <h1 class="text-4xl font-bold">{{$product->name}}</h1>
        <p class="text-gray-700 my-5">Stock: {{$product->stock}}</p>
        <p class="text-gray-700 font-bold text-2xl">RS {{$product->price}}</p>
        <form action="{{route('addtocart')}}" method="post">
        @csrf
            <input type="number" class="border-2 border-gray-300 p-2 w-24" name="quantity" id="quantity" value="1" min="1" max="{{$product->stock}}">
            <br>
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <input type="submit" value="Add to Cart" class="bg-blue-500 text-white py-2 px-4 mt-2 inline-block cursor-pointer">
        </form> 
        <div class="px-4">
            <h2 class="font-blod text-3xl">rating</h2>
            <style>

             .filled-star {
                    color: gold;
                    font-size: 2rem;
                }

                .empty-star {
                    color: lightgray;
                    font-size: 2rem;
                }
            </style>
                @php
                            $averageRating = $product->ratings()->avg('rating');
                 @endphp

                <div class="average-rating">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $averageRating)
                            <span class="filled-star">★</span>
                        @else
                            <span class="empty-star">☆</span>
                        @endif
                    @endfor
                    <p>{{ round($averageRating, 1) }} out of 5</p>
                </div>
        </div>
    </div>
    <div class="px-24">
        <h2 class="font-bold text-3xl">Product description</h2>
        <p class="text-gray-700" id="description">
            {{ Str::limit($product->description, 100) }} <!-- This will show only the first 100 characters -->
            <span id="more-text" class="hidden">{{ substr($product->description, 100) }}</span>
        </p>
        <a id="read-more" class="text-blue-500 cursor-pointer">Read More</a>
    </div>
    <script>
        document.getElementById("read-more").addEventListener("click", function () {
            const moreText = document.getElementById("more-text");
            const readMoreLink = document.getElementById("read-more");
            
            if (moreText.classList.contains("hidden")) {
                moreText.classList.remove("hidden");
                readMoreLink.innerText = "Read Less";
            } else {
                moreText.classList.add("hidden");
                readMoreLink.innerText = "Read More";
            }
        });
    </script>


</div>
<h2 class="mt-10 text-4xl font-bold px-24">Related Product</h2>
<div class="grid my-10 grid-cols-4 gap-10 px-24">
    @foreach ($relatedproducts as $product )
        <div class="border p-4 rounded shadow">x
                    <img src="{{asset('images/products/'.$product->photopath)}}" class="w-full h-44 object-cover" alt="">
                    <h2 class="text-xl font-bold my-2">{{$product->name}}</h2>
                    <p class="text-gray-700 line-clamp-2">{{$product->description}}</p>
                    <p class="text-gray-700 font-bold mt-2">Rs {{$product->price}}</p>
                    <a href="{{route('viewproduct',$product->id)}}" class="bg-blue-500 text-white py-2 px-4 mt-2 inline-block">View</a>
        </div>
        
    @endforeach

</div>
 @endsection