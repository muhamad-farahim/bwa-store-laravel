<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\Regency;

class LocationController extends Controller
{
    

    function province(){

        return Province::all();
    }

    function regency(Request $request, $id){

        return Regency::where('province_id', $id)->get();
    }
}