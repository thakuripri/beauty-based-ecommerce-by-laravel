@extends('layouts.app')
@section('content')
<form action="{{ route('ratings.store') }}" method="POST" class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    
    <h2 class="text-xl font-semibold mb-4">Rate this Product</h2>
    
    <label for="rating" class="block text-gray-700 text-sm font-medium mb-2">Rate this product:</label>
    <select name="rating" id="rating" required class="block w-full border border-gray-300 rounded-md p-2 mb-4 focus:ring focus:ring-blue-500">
        <option value="" disabled selected>Select a rating</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

    <label for="review" class="block text-gray-700 text-sm font-medium mb-2">Write a review (optional):</label>
    <textarea name="review" id="review" rows="4" placeholder="Write your review here..." class="block w-full border border-gray-300 rounded-md p-2 mb-4 focus:ring focus:ring-blue-500"></textarea>

    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md transition duration-200">
        Submit Rating
    </button>
</form>


@endsection

