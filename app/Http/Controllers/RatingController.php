<?php
namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
          // Validate the incoming request
          $validated = $request->validate([
            'product_id' => 'required|exists:products,id',  // Ensure the product exists
            'rating'     => 'required|integer|min:1|max:5', // Rating between 1 and 5
            'review'     => 'nullable|string|max:1000',     // Optional review with max length of 1000 characters
        ]);

        // Store the rating and review
        $rating = Rating::create([
            'user_id'    => auth()->id(), // Get the currently authenticated user
            'product_id' => $validated['product_id'],
            'rating'     => $validated['rating'],
            'review'     => $validated['review'],
        ]);

        // Redirect or return a response (optional)
        return redirect()->back()->with('success', 'Rating and review submitted successfully!');
    }
}