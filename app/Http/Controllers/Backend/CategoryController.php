<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'

        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->save();

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function edit($cat_id)
    {
        $category = Category::find($cat_id);
        return view('backend.admin.category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $cat_id = $request->id;
        Category::find($cat_id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('category.show')->with('message', 'Category Updated');
    }

    public function delete($cat_id)
    {
        $category = Category::find($cat_id)->delete();
        return Redirect()->back()->with('message', 'Category Deleted');
    }

    public function deactive($cat_id)
    {
        Category::find($cat_id)->update(['status' => 0]);
        return Redirect()->back()->with('message', 'Status Updated');
    }

    public function active($cat_id)
    {
        Category::find($cat_id)->update(['status' => 1]);
        return Redirect()->back()->with('message', 'Status Updated');
    }
}
