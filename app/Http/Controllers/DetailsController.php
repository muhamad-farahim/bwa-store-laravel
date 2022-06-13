<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;

class DetailsController extends Controller
{
    function index($id){

        $product = Product::with('user', 'galleries')->where('slug' , $id)->first();

        return view('pages.details', compact('product'));
    }

    function add(Request $request, $id){

        $product = Product::with('user', 'galleries')->where('id' , $id)->firstOrFail();
        $user = $request->user();

        Cart::create(['products_id' => $product->id, 'users_id' => $user->id]);

        return redirect()->route('details', ['id' => $product->slug]);
    }
}