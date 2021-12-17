<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SuperAdminController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;


//Frontend route
Route::get('/', [FrontendController::class, 'index']);


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
