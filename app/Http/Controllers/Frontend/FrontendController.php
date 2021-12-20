<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->latest()->get();
        $latest_products = Product::where('status', 1)->limit(3)->get();
        $categories = Category::where('status', 1)->latest()->get();
        $brands = Brand::all();
        return view('frontend.welcome', compact('products', 'categories', 'brands', 'latest_products'));
    }


    public function productDetails($product_id)
    {
        $categories = Category::where('status', 1)->latest()->get();
        $product = Product::findOrFail($product_id);
        $category_id = $product->category_id;
        $related_product = Product::where('category_id', $category_id)->where('id', '!=', $product_id)->latest()->get();
        return view('frontend.pages.product_details', compact('product', 'categories', 'related_product'));
    }
}
