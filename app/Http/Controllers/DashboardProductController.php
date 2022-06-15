<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductGallery;

use App\Http\Requests\ProductGalleryRequest;
use App\Http\Requests\admin\ProductRequest;

use Illuminate\Support\Str;

class DashboardProductController extends Controller
{
    function index(Request $request)
    {
        $products = Product::with('category', 'galleries')->where('user_id', $request->user()->id)->has('galleries')->get();

        return view('pages.dashboard-products', compact('products'));
    }
    function details(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user', 'category'])->findOrFail($id);
        $categories = Category::all();

        return view('pages.dashboard-products-details', compact(['product', 'categories']));
    }
    function create()
    {
        $categories = Category::all();

        return view('pages.dashboard-products-create', compact('categories'));
    }

    function uploadGallery(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/ProductGallery', 'public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-product-details', $request->products_id);
    }

    function deleteGallery(Request $request, $id)
    {
        $instance = ProductGallery::findOrFail($id);

        $idp = $instance->product->id;

        $instance->delete();

        return redirect()->route('dashboard-product-details', $idp);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',
                'categories_id' => 'required|exists:categories,id',
                'price' => 'required|integer',
                'description' => 'required'

            ]
        );

        $instance = Product::findOrFail($id);

        $data = $request->all();

        $data['user_id'] = $request->user()->id;

        $data['slug'] = Str::slug($data['name']);

        $instance->update($data);

        return redirect()->route('dashboard-product');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',
                'categories_id' => 'required|exists:categories,id',
                'price' => 'required|integer',
                'description' => 'required'

            ]
        );

        $data['slug'] = Str::slug($data['name']);
        $data['user_id'] = $request->user()->id;

        $product = Product::create($data);

        $imgarr = [
            "products_id" => $product->id,
            "photo" => $request->file('photo')->store('assets/ProductGallery', 'public'),
        ];

        ProductGallery::create($imgarr);

        return redirect()->route('dashboard-product');
    }
}