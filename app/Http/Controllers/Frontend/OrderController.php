<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Cart;
use App\Models\Shipping;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function storeOrder(Request  $request)
    {

        $request->validate([
            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
        ]);
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'invoice_no' => mt_rand(10000000, 99999999),
            'payment_type' => $request->payment_type,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
            'coupon_discount' => $request->coupon_discount,
            'created_at' => Carbon::now(),
        ]);

        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->product_id,
                'product_qty' => $cart->qty,
                'created_at' => Carbon::now(),
            ]);
        }

        Shipping::insert([
            'order_id' => $order_id,
            'shipping_first_name' => $request->shipping_first_name,
            'shipping_last_name' => $request->shipping_last_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'address' => $request->address,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'created_at' => Carbon::now(),
        ]);

        if (Session::has('coupon')) {
            session()->forget('coupon');
        }

        Cart::where('user_ip', request()->ip())->delete();
        return Redirect()->to('order/success')->with('order_success', 'Order Copleted');
    }

    public function orderSuccess()
    {
        $categories = Category::where('status', 1)->latest()->get();
        return view('frontend.pages.orderSuccess', compact('categories'));
    }
}
