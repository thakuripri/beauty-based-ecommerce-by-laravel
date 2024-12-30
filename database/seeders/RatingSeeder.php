<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you already have some products and users
        Rating::create([
            'rating' => 5,
            'review' => 'Fantastic product!',
            'user_id' => 1,  // Make sure the user with ID 1 exists
            'product_id' => 1,  // Make sure the product with ID 1 exists
        ]);

        Rating::create([
            'rating' => 4,
            'review' => 'Pretty good product.',
            'user_id' => 2,  // Make sure the user with ID 2 exists
            'product_id' => 2,  // Make sure the product with ID 2 exists
        ]);
    }
}
