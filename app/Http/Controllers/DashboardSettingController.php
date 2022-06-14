<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

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

        $item->update($data);

        return redirect()->route($redirect);
    }
}