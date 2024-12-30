<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
       // $products = Product::all()->toArray(); // Convert Eloquent collection to array
        //Product::bubbleSortByPrice($products); // Call the sorting function
        //return view('products.index', compact('products'));
        
        $products = Product::orderBy('price', 'asc')->get(); //bubblesorting, ascending by price
        return view('product.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('priority')->get();
        return view('product.create',compact('categories'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'photopath' => 'required|image',
            'stock' => 'required',
            'status' => 'required',
        ]);

        if($request->hasFile('photopath')){
            $file = $request->photopath;
            $filename = $file->getClientOriginalName();
            $filename = time().'_'.$filename;
            $file->move('images/products',$filename);
            $data['photopath'] = $filename;
        }

        Product::create($data);
        return redirect(route('product.index'));
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::orderBy('priority')->get();
        return view('product.edit',compact('product','categories'));
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'photopath' => 'nullable',
            'stock' => 'required',
            'status' => 'required',
        ]);

        $product = Product::find($id);

        if($request->hasFile('photopath')){
            $file = $request->photopath;
            $filename = $file->getClientOriginalName();
            $filename = time().'_'.$filename;
            $file->move('images/products',$filename);
            File::delete(public_path('images/products/'.$product->photopath));
            $data['photopath'] = $filename;
        }

        $product->update($data);
        return redirect(route('product.index'));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        File::delete(public_path('images/products/'.$product->photopath));
        $product->delete();
        return redirect(route('product.index'));
    }

    public function categoryproduct($catid){
        $products =Product::where('categoy_id',$catid)->get();
        return view('categoryproduct',compact('products'));
    }
    
    public function show($id)
    {
        $post = Product::with('ratings.user')->findOrFail($id);

        return view('products.show', compact('product'));
    }
    /**
     * Show the rating form for a specific product.
     */
    public function rating($id)
    {
        // Fetch the product by its ID
        $product = Product::findOrFail($id);

        // Return the rating view and pass the product data to the view
        return view('product.rating', compact('product'));
    }
    //filter algorithm
    /*public function filterProducts(Request $request)
    {
        // Start building the query
        $query = Product::query();

        // Filter by minimum rating
        if ($request->has('min_rating')) {
            $minRating = $request->input('min_rating');
            $query->where('average_rating', '>=', $minRating);
        }

        // Filter by maximum rating
        if ($request->has('max_rating')) {
            $maxRating = $request->input('max_rating');
            $query->where('average_rating', '<=', $maxRating);
        }

        // Additional filters (optional)
        if ($request->has('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        // Sort by rating (if required)
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            if ($sort == 'rating_desc') {
                $query->orderBy('average_rating', 'desc');
            } elseif ($sort == 'rating_asc') {
                $query->orderBy('average_rating', 'asc');
            }
        }

        // Get the filtered products
        $products = $query->get();

        // Pass the products to the view
        return view('product.index', compact('product'));
    }*/

}