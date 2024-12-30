<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'price',
        'stock',
        'status',
        'category_id',
        'photopath',
        'reviews',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //bubblesort
    
    

//chatgpt
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function index()
    {
        // Eager load ratings along with products
        $products = Product::with('ratings.user', 'category')->get(); // Eager load both ratings and users for each rating

        return view('product.index', compact('products'));
        
    }
}
