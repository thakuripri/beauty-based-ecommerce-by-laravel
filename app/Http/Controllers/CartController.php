<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
     public function index(){
        $carts= cart::where('user_id',auth()->id())->get();
        return view('cart', compact('carts'));
     }

     public function checkout($cart)
     {
        $cart = cart::find($cart);
        return view('checkout',compact('cart'));
     }

 public function store(Request $request)
 {
    $data =$request->validate([
        'product_id'=>'required',
        'quantity'=>'required|integer|min:1'
    ]);
    $data['user_id']=auth()->id();
    $check =cart::where('user_id',$data['user_id'])->where('product_id', $data['product_id'])->first();
    if(!empty($check))
{
    return back()->with('success','product already in cart');
}    cart::create($data);
    return back()->with('success','product aadded to cart');
 }
}
