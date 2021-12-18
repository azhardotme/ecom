<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $product_id)
    {
        $check = Cart::where('product_id', $product_id)->where('user_ip', request()->ip())->first();

        if ($check) {
            Cart::where('product_id', $product_id)->where('user_ip', request()->ip())->increment('qty');
            return Redirect()->back()->with('cart', 'Product Added to Cart');
        } else {

            Cart::insert([
                'product_id' => $product_id,
                'qty' => 1,
                'price' => $request->price,
                'user_ip' => request()->ip(),
            ]);
            return Redirect()->back()->with('cart', 'Product Added to Cart');
        }
    }
    public function cart()
    {
        $categories = Category::where('status', 1)->latest()->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();

        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function ($totall) {
            return $totall->price * $totall->qty;
        });
        return view('frontend.cartpage', compact('categories', 'carts', 'subtotal'));
    }

    //Cart product remove

    public function cartDestroy($cart_id)
    {
        Cart::where('id', $cart_id)->where('user_ip', request()->ip())->delete();
        return Redirect()->back()->with('cart_remove', 'Product Removed from Cart');
    }

    public function cartUpdate(Request $request, $cart_id)
    {
        Cart::where('id', $cart_id)->where('user_ip', request()->ip())->update([
            'qty' => $request->qty,
        ]);
        return Redirect()->back()->with('cart_update', 'Product Update from Cart');
    }

    //Applied coupon
    public function couponApply(Request $request)
    {
        $check = Coupon::where('coupon_name', $request->coupon_name)->first();
        if ($check) {
            Session::put('coupon', [
                'coupon_name' => $check->coupon_name,
                'coupon_discount' => $check->discount,
            ]);
            return Redirect()->back()->with('cart_update', 'Coupon Applied!');
        } else {
            return Redirect()->back()->with('cart_remove', 'Invalid Coupon!');
        }
    }
}
