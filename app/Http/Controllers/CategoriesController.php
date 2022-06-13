<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class CategoriesController extends Controller
{
    function index(){

        $categories = Category::all();
        $products = Product::take(32)->get();

        return view('pages.categories', compact(['categories', 'products']));
    }
}