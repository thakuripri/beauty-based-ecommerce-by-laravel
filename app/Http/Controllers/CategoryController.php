<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
{
    // Fetch all categories
    $categories = Category::all()->toArray(); // Convert to array for easier sorting

    // Merge Sort function
    function mergeSort($array) {
        if (count($array) <= 1) {
            return $array;
        }

        $middle = floor(count($array) / 2);

        // Recursively split and sort
        $left = mergeSort(array_slice($array, 0, $middle));
        $right = mergeSort(array_slice($array, $middle));

        return merge($left, $right);
    }

    // Merge function to combine two sorted arrays
    function merge($left, $right) {
        $result = [];

        while (count($left) > 0 && count($right) > 0) {
            if ($left[0]['priority'] <= $right[0]['priority']) {
                $result[] = array_shift($left);
            } else {
                $result[] = array_shift($right);
            }
        }

        // Append remaining items
        return array_merge($result, $left, $right);
    }

    // Sort categories by 'priority' field
    $sortedCategories = mergeSort($categories);

    // Convert back to a collection (if necessary for Laravel functionality)
    $categories = collect($sortedCategories);

    // Pass sorted categories to the view
    return view('category.index', compact('categories'));
}



    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request){
        // $category = new Category();
        // $category->categoryname = $request->categoryname;
        // $category->priority = $request->priority;
        // $category->save();

        // Category::create([
        //     'categoryname' => $request->categoryname,
        //     'priority' => $request->priority,
        // ]);

        $data = $request->validate([
            'categoryname' => 'required',
            'priority' => 'required|numeric',
        ]);

        Category::create($data);

        return redirect(route('category.index'))->with('success','Category Added Successfully');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('category.edit',compact('category'));
    }



    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'categoryname' => 'required',
            'priority' => 'required|numeric',
        ]);

        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect(route('category.index'))->with('success','Category Updated Successfully');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(route('category.index'))->with('success','Category Deleted Successfully');
    }
}