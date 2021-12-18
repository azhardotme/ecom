<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('backend.admin.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('backend.admin.coupon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required|unique:coupons,coupon_name',
            'discount' => 'required',

        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->save();

        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'discount' => $request->discount,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function edit($coupon_id)
    {
        $coupons = Coupon::findOrFail($coupon_id);
        return view('backend.admin.coupon.edit', compact('coupons'));
    }

    public function update(Request $request)
    {
        $coupon_id = $request->id;
        Coupon::findOrFail($coupon_id)->update([
            'coupon_name' => $request->coupon_name,
            'discount' => $request->discount,
            'updated_at' => Carbon::now(),
        ]);

        return Redirect()->route('coupon.show')->with('message', 'Coupon Updated');
    }

    public function delete($coupon_id)
    {
        $coupon = Coupon::findOrFail($coupon_id)->delete();
        return Redirect()->back()->with('message', 'Coupon Deleted');
    }

    public function deactive($coupon_id)
    {
        Coupon::find($coupon_id)->update(['status' => 0]);
        return Redirect()->back()->with('message', 'Coupon Deactive!');
    }

    public function active($coupon_id)
    {
        Coupon::find($coupon_id)->update(['status' => 1]);
        return Redirect()->back()->with('message', 'Coupon Active!');
    }
}
