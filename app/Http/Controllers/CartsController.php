<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

class CartsController extends Controller
{
    function __construct()
    {

        $this->middleware('auth');
        
    }

    function index(Request $request){

        $carts = Cart::with(['product.galleries', 'product.user'])->where('users_id', $request->user()->id)->get();

        return view('pages.carts', compact('carts'));
    }

    function delete($id){

        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart');
    }

    function success(){

        return view('pages.success');
    }
}