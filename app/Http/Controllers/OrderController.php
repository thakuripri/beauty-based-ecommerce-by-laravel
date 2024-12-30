<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cart = Cart::find($request->input('cart_id'));
        $data['product_id'] = $cart->product_id;
        $data['quantity'] = $cart->quantity;
        $data['price'] = $cart->product->price;
        $data['user_id'] = auth()->id();
        $data['order_date'] = date('Y-m-d');
        $data['status'] = 'Pending';
        Order::create($data);
        $cart->delete();
        return redirect('/cart')->with('success', 'Order placed successfully');

    }


    public function index()
    {
        $orders = Order::all();
        return view('order.index',compact('orders'));
    }

    public function status($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        $data=[
            'name'=>$order->user->name,
            'status'=>$status
        ];
        //Mail function
        // Mail::send('emails.ordermail',$data, function ($message)use($order){ $message->to($order->user->email,$order->user->name); 
        // $message->subject('Order status Notify'); }); 
        return redirect()->back()->with('success', 'Order is now '.$status);   
    }
}