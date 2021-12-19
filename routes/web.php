<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SuperAdminController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\WishlistController;
use Illuminate\Support\Facades\Auth;


//Frontend route
Route::get('/', [FrontendController::class, 'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin dashboard routes
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [SuperAdminController::class, 'dashboard']);
Route::get('/logout', [SuperAdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'show_dashboard']);

//Category route
Route::get('admin/category-create', [CategoryController::class, 'create'])->name('category.create');
Route::post('admin/category-store', [CategoryController::class, 'store'])->name('category.store');
Route::get('admin/category-show', [CategoryController::class, 'index'])->name('category.show');
Route::get('admin/categories/edit/{cat_id}', [CategoryController::class, 'edit']);
Route::post('admin/categories-update', [CategoryController::class, 'update'])->name('update.category');
Route::get('admin/categories/delete/{cat_id}', [CategoryController::class, 'delete']);
//Category Status
Route::get('admin/categories/deactive/{cat_id}', [CategoryController::class, 'deactive']);
Route::get('admin/categories/active/{cat_id}', [CategoryController::class, 'active']);


//Brand route
Route::get('admin/brand-create', [BrandController::class, 'create'])->name('brand.create');
Route::post('admin/brand-store', [BrandController::class, 'store'])->name('brand.store');
Route::get('admin/brand-show', [BrandController::class, 'index'])->name('brand.show');
Route::get('admin/brands/edit/{brand_id}', [BrandController::class, 'edit']);
Route::post('admin/brands-update', [BrandController::class, 'update'])->name('update.brand');
Route::get('admin/brands/delete/{brand_id}', [BrandController::class, 'delete']);
// Brand Status
Route::get('admin/brands/deactive/{brand_id}', [BrandController::class, 'deactive']);
Route::get('admin/brands/active/{brand_id}', [BrandController::class, 'active']);


//Product route
Route::get('admin/product-create', [ProductController::class, 'create'])->name('product.create');
Route::post('admin/product-store', [ProductController::class, 'store'])->name('product.store');
Route::get('admin/product-show', [ProductController::class, 'index'])->name('product.show');
Route::get('admin/products/edit/{product_id}', [ProductController::class, 'edit']);
Route::post('admin/products-update', [ProductController::class, 'update'])->name('update.product');
Route::post('admin/products/update-image', [ProductController::class, 'updateImage'])->name('update.image');
Route::get('admin/products/delete/{product_id}', [ProductController::class, 'delete']);
// Product Status
Route::get('admin/products/deactive/{product_id}', [ProductController::class, 'deactive']);
Route::get('admin/products/active/{product_id}', [ProductController::class, 'active']);

//Coupon route
Route::get('admin/coupon-create', [CouponController::class, 'create'])->name('coupon.create');
Route::post('admin/coupon-store', [CouponController::class, 'store'])->name('coupon.store');
Route::get('admin/coupon-show', [CouponController::class, 'index'])->name('coupon.show');
Route::get('admin/coupons/edit/{coupon_id}', [CouponController::class, 'edit']);
Route::post('admin/coupons-update', [CouponController::class, 'update'])->name('update.coupon');
Route::get('admin/coupons/delete/{coupon_id}', [CouponController::class, 'delete']);
// Coupon Status
Route::get('admin/coupons/deactive/{coupon_id}', [CouponController::class, 'deactive']);
Route::get('admin/coupons/active/{coupon_id}', [CouponController::class, 'active']);

//Cart route
Route::post('add/to-cart/{product_id}', [CartController::class, 'addToCart']);
//Cart page
Route::get('cart', [CartController::class, 'cart']);
Route::get('cart/destroy/{cart_id}', [CartController::class, 'cartDestroy']);
Route::post('cart/quantity/update/{cart_id}', [CartController::class, 'cartUpdate']);

//Coupon code apply
Route::post('apply/coupon', [CartController::class, 'couponApply']);

//Wishlist route
Route::get('add/to-wishlist/{product_id}', [WishlistController::class, 'addToWishlist']);
Route::get('wishlist', [WishlistController::class, 'wishlistPage']);
Route::get('wishlist/destroy/{wishlist_id}', [WishlistController::class, 'wishlistDestroy']);
