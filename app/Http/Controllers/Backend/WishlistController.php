<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist($product_id)
    {
        if (Auth::check()) {

            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
            ]);
            return Redirect()->back()->with('cart', 'Product Added on Wishlist');
        } else {
            return Redirect()->route('login')->with('login_error', 'At first login your Account!');
        }
    }

    public function wishlistPage()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->latest()->get();
        $categories = Category::where('status', 1)->latest()->get();
        return view('frontend.pages.wishlist', compact('wishlists', 'categories'));
    }

    public function wishlistDestroy($wishlist_Id)
    {
        Wishlist::where('id', $wishlist_Id)->where('user_id', Auth::id())->delete();
        return Redirect()->back()->with('cart_remove', 'Product Removed from Wishlist');
    }
}
