@extends('layouts.master')
@section('content')
<!-- Assuming $post is the post being viewed -->
<h1>{{ $product->title }}</h1>
<p>{{ $product->content }}</p>

<hr>

<h2>Ratings & Reviews</h2>

@if ($product->ratings->count() > 0)
    @foreach ($product->ratings as $rating)
        <div class="review">
            <strong>Rated {{ $rating->rating }} out of 5</strong>
            <p><strong>By:</strong> {{ $rating->user->name }}</p>
            
            @if ($rating->review)
                <p><strong>Review:</strong> {{ $rating->review }}</p>
            @else
                <p><em>No review written.</em></p>
            @endif

            <hr>
        </div>
    @endforeach
@else
    <p>No ratings or reviews yet.</p>
@endif
@endsection
