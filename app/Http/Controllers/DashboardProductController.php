<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    function index(){


        return view('pages.dashboard-products');
    }
        function details(){


        return view('pages.dashboard-products-details');
    }
}
