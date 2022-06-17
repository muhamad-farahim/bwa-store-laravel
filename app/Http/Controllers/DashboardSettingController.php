<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\User;



class DashboardSettingController extends Controller
{
    function store(Request $request)
    {
        $user = $request->user();
        $categories = Category::all();
        return view('pages.dashboard-settings', compact(['user', 'categories']));
    }
    function account(Request $request)
    {
        $user = $request->user();

        return view('pages.dashboard-account', compact('user'));
    }
    function update(Request $request, $redirect)
    {
        $data = $request->all();

        $item = $request->user();


        $item->provinces_id = $data['provinces_id'];
        $item->regencies_id = $data['regencies_id'];

        $item->save();
        return redirect()->route($redirect);
    }
}