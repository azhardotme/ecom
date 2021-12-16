<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SuperAdminController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\CategoryController;

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

//Status
Route::get('admin/categories/deactive/{cat_id}', [CategoryController::class, 'deactive']);
Route::get('admin/categories/active/{cat_id}', [CategoryController::class, 'active']);
