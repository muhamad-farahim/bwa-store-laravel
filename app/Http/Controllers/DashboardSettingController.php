<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    function store(){


        return view('pages.dashboard-settings');
    }    function account(){


        return view('pages.dashboard-account');
    }
}
