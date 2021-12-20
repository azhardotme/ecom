<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function ($totall) {
                return $totall->price * $totall->qty;
            });
            $carts = Cart::where('user_ip', request()->ip())->latest()->get();
            $categories = Category::where('status', 1)->latest()->get();
            return view('frontend.pages.checkout', compact('categories', 'carts', 'subtotal'));
        } else {
            return Redirect()->route('login');
        }
    }
}
