<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
// home controller routes
Route::get("/",[HomeController::class,"index"])->name("public.home");
Route::get("/product/{pro_id}/",[HomeController::class,"productView"])->name("public.product.view");
Route::get("/add-to-cart/{id}",[HomeController::class,"addToCart"])->name("public.addToCart");
Route::get("/remove-from-cart/{id}/",[HomeController::class,"removeFromCart"])->name("public.removeFromCart");
Route::get("cart/",[HomeController::class,"cartSummary"])->name("public.cart");
Route::post("/add-coupon",[HomeController::class,"addCoupon"])->name("public.addCoupon");
Route::get("/remove-coupon",[HomeController::class,"removeCoupon"])->name("public.removeCoupon");
Route::get("/search",[HomeController::class,"search"])->name("public.search");
Route::get("/catfilter/{id}",[HomeController::class,"catfilter"])->name("public.catfilter");
Route::match(["GET","POST"],"/checkout",[HomeController::class,"checkout"])->name("public.checkout");

// admin controller routes
Route::prefix("admin/")->middleware(["auth","isAdmin"])->group(function(){
    Route::get("/",[AdminController::class,"index"])->name("admin.dashboard");
    Route::Resource("category",CategoryController::class);
    Route::Resource("product",ProductController::class);
    Route::Resource("coupon",CouponController::class);
    Route::Resource("address",AddressController::class);
    Route::Resource("user",UserController::class);
    Route::Resource("order",OrderController::class);
});

// login routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';