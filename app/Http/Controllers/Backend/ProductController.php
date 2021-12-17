<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Image;

use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::orderBy('id', 'DESC')->get();
        return view('backend.admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.admin.product.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|max:255',
            'price' => 'required|max:255',
            'product_quantity' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'long_description' => 'required',
            'short_description' => 'required',
            'image_one' => 'required',
            'image_two' => 'required',
            'image_three' => 'required',
        ], [
            'category_id.required' => 'Select Category name',
            'brand_id.required' => 'Select Brand name',
        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->save();



        $img_one = $request->file('image_one');
        $name_gen = hexdec(uniqid()) . '.' . $img_one->getClientOriginalExtension();
        Image::make($img_one)->resize(270, 270)->save('frontend/img/product/upload/' . $name_gen);
        $img_url1 = 'frontend/img/product/upload/' . $name_gen;

        $img_two = $request->file('image_two');
        $name_gen2 = hexdec(uniqid()) . '.' . $img_two->getClientOriginalExtension();
        Image::make($img_two)->resize(270, 270)->save('frontend/img/product/upload/' . $name_gen);
        $img_url2 = 'frontend/img/product/upload/' . $name_gen2;

        $img_three = $request->file('image_three');
        $name_gen = hexdec(uniqid()) . '.' . $img_three->getClientOriginalExtension();
        Image::make($img_three)->resize(270, 270)->save('frontend/img/product/upload/' . $name_gen);
        $img_url3 = 'frontend/img/product/upload/' . $name_gen;

        Product::insert(
            [
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'price' => $request->price,
                'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
                'product_quantity' => $request->product_quantity,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'image_one' => $img_url1,
                'image_two' => $img_url2,
                'image_three' => $img_url3,
                'created_at' => Carbon::now()
            ]
        );

        return redirect()->back()->with('message', 'Product Added Successfully!');
    }

    public function edit($product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::findOrFail($product_id);
        return view('backend.admin.product.edit', compact('products', 'categories', 'brands'));
    }

    //Update Product Information
    public function update(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'price' => $request->price,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_quantity' => $request->product_quantity,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('product.show')->with('message', 'Product Updated');
    }

    //Update product images
    public function updateImage(Request $request)
    {
        $product_id = $request->id;
        $old_one = $request->img_one;
        $old_two = $request->img_two;
        $old_three = $request->img_three;

        if ($request->has('image_one')) {
            unlink($old_one);

            $img_one1 = $request->file('image_one');
            $name_gen = hexdec(uniqid()) . '.' . $img_one1->getClientOriginalExtension();
            Image::make($img_one1)->resize(270, 270)->save('frontend/img/product/upload/' . $name_gen);
            $img_url1 = 'frontend/img/product/upload/' . $name_gen;

            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('product.show')->with('message', 'Product Updated');
        }


        if ($request->has('image_two')) {
            unlink($old_two);

            $img_one1 = $request->file('image_two');
            $name_gen = hexdec(uniqid()) . '.' . $img_one1->getClientOriginalExtension();
            Image::make($img_one1)->resize(270, 270)->save('frontend/img/product/upload/' . $name_gen);
            $img_url1 = 'frontend/img/product/upload/' . $name_gen;

            Product::findOrFail($product_id)->update([
                'image_two' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('product.show')->with('message', 'Product Updated');
        }

        if ($request->has('image_three')) {
            unlink($old_one);

            $img_one1 = $request->file('image_three');
            $name_gen = hexdec(uniqid()) . '.' . $img_one1->getClientOriginalExtension();
            Image::make($img_one1)->resize(270, 270)->save('frontend/img/product/upload/' . $name_gen);
            $img_url1 = 'frontend/img/product/upload/' . $name_gen;

            Product::findOrFail($product_id)->update([
                'image_three' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('product.show')->with('message', 'Product Updated');
        }
    }

    public function delete($product_id)
    {

        $image = Product::findOrFail($product_id);
        $img_one = $image->image_one;
        $img_two = $image->image_two;
        $img_three = $image->image_three;

        // // unlink($img_one);
        // unlink($img_two);
        // unlink($img_three);

        $product = Product::findOrFail($product_id)->delete();
        return Redirect()->back()->with('message', 'Product Deleted');
    }

    public function deactive($product_id)
    {
        Product::find($product_id)->update(['status' => 0]);
        return Redirect()->back()->with('message', 'Product Deactive!');
    }

    public function active($product_id)
    {
        Product::find($product_id)->update(['status' => 1]);
        return Redirect()->back()->with('message', 'Product Active!');
    }
}
