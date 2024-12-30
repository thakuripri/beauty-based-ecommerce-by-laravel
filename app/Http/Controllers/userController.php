<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $users =User::Where('role','user')->get();
        return view('user.index',compact('users'));
    }
    public function show($id)
        {
            // Fetch the user with the given ID
        $user = User::with('PurchaseOrders')->findOrFail($id);

        // Pass the user to the view
        return view('user.show', compact('user'));
  
           
        }
}
