<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[\App\Http\Controllers\Front\HomeController::class,'index']);

Route::prefix("/shop")->group(function () {
    Route::get('/',[\App\Http\Controllers\Front\ShopController::class,'index']);
    Route::get('/shop',[\App\Http\Controllers\Front\ShopController::class,'show']);
    Route::get('/wishlist',[\App\Http\Controllers\Front\ShopController::class,'wishlist']);
});

Route::prefix("/blog")->group(function () {
    Route::get('/',[\App\Http\Controllers\Front\BlogController::class,'index']);
    Route::get('/detail',[\App\Http\Controllers\Front\BlogController::class,'show']);

});

Route::prefix("/contact")->group(function () {
    Route::get('/',[\App\Http\Controllers\Front\ContactController::class,'index']);
});

 Route::prefix('admin')->group(function (){
     Route::get('dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'index']);
     Route::get('/statistical',[\App\Http\Controllers\Admin\DashboardController::class,'statistical']);
     Route::get('/order7Days',[\App\Http\Controllers\Admin\DashboardController::class,'order7Days']);
 });

Route::prefix('/cart')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CartController::class,'index']);
});
Route::prefix('/checkout')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CheckoutController::class,'index']);
});

Route::prefix('account')->group(function () {
    Route::get('my-account',[\App\Http\Controllers\Front\AccountController::class,'myAccount']);
    Route::get('login',[\App\Http\Controllers\Front\AccountController::class,'login']);
    Route::post('login',[\App\Http\Controllers\Front\AccountController::class,'checkLogin']);
    Route::get('register',[\App\Http\Controllers\Front\AccountController::class,'register']);
    Route::get('logout',[\App\Http\Controllers\Front\AccountController::class,'logout']);
});

