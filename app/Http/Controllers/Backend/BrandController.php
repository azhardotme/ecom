<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('backend.admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name'

        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->save();

        Brand::insert([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('backend.admin.brand.edit', compact('brands'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('brand.show')->with('message', 'Brand Updated');
    }

    public function delete($id)
    {
        $brand = Brand::find($id)->delete();
        return Redirect()->back()->with('message', 'Brand Deleted');
    }

    public function deactive($id)
    {
        Brand::find($id)->update(['status' => 0]);
        return Redirect()->back()->with('message', 'Brand Deactive!');
    }

    public function active($id)
    {
        Brand::find($id)->update(['status' => 1]);
        return Redirect()->back()->with('message', 'Brand Active!');
    }
}
