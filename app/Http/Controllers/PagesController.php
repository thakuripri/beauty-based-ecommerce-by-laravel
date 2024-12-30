<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $products = Product::latest()->limit(4)->get();
        return view('welcome', compact('products'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function viewproduct($id)
    {
        $product = Product::find($id);
        $relatedproducts = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->limit(4)->get();
        return view('viewproduct', compact('product', 'relatedproducts'));
   }

    public function categoryproduct($catid)
    {
        $category = Category::find($catid);
        $products = Product::where('category_id', $catid)->paginate(16);
        return view('categoryproduct', compact('products', 'category'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
         // Fetch and sort products by name (ascending order)
         $products = Product::orderBy('name')->get();

         // Convert the sorted products to an array for binary search
         $sortedProducts = $products->toArray();
 
         // Use binary search to find products with matching names
         $products = $this->binarySearchProducts($sortedProducts, $search);
 
         // Return the view with the matched products
         return view('search', compact('products', 'search'));
     }
 
     private function binarySearchProducts($products, $search)
     {
         $low = 0;
         $high = count($products) - 1;
         $matchedProducts = [];
 
         while ($low <= $high) {
             $mid = floor(($low + $high) / 2);
 
             // Compare the search string with the current product's name
             if (stripos($products[$mid]['name'], $search) !== false) {
                 // Found a match, add it to the result array
                 $matchedProducts[] = $products[$mid];
 
                 // Look for additional matches on both sides of the midpoint
                 // Move mid pointers for neighboring matches
                 $left = $mid - 1;
                 $right = $mid + 1;
 
                 // Find all matching on the left side
                 while ($left >= 0 && stripos($products[$left]['name'], $search) !== false) {
                     $matchedProducts[] = $products[$left];
                     $left--;
                 }
 
                 // Find all matching on the right side
                 while ($right < count($products) && stripos($products[$right]['name'], $search) !== false) {
                     $matchedProducts[] = $products[$right];
                     $right++;
                 }
 
                 break; // Exit loop after finding a match
             }
 
             if (strcasecmp($products[$mid]['name'], $search) < 0) {
                 // Search right half
                 $low = $mid + 1;
             } else {
                 // Search left half
                 $high = $mid - 1;
             }
         }
 
         return $matchedProducts; }
}