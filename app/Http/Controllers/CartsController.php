<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartsController extends Controller
{
    function index(){

        return view('pages.carts');
    }

    function success(){

        return view('pages.success');
    }
}