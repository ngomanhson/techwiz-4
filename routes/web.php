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
    Route::get('/{id}',[\App\Http\Controllers\Front\ShopController::class,'detail']);
    Route::get('/category/{categoryName}',[\App\Http\Controllers\Front\ShopController::class,'category']);
});

Route::prefix("/blog")->group(function () {
    Route::get('/',[\App\Http\Controllers\Front\BlogController::class,'index']);
    Route::get('/detail',[\App\Http\Controllers\Front\BlogController::class,'show']);

});

Route::prefix("/contact")->group(function () {
    Route::get('/',[\App\Http\Controllers\Front\ContactController::class,'index']);
    Route::post('/save',[\App\Http\Controllers\Front\ContactController::class,'sendContact']);

});

 Route::prefix('admin')->middleware('CheckAdminLogin')->group(function (){
     Route::get('dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'index']);
     Route::resource('product/{product_id}/image',\App\Http\Controllers\Admin\ProductImageController::class);
     Route::resource('product/{product_id}/detail',\App\Http\Controllers\Admin\ProductDetailController::class);
     Route::get('/statistical',[\App\Http\Controllers\Admin\DashboardController::class,'statistical']);
     Route::get('/order7Days',[\App\Http\Controllers\Admin\DashboardController::class,'order7Days']);
//xử lý order
     Route::get('orders',[\App\Http\Controllers\Admin\OrdersController::class,'index']);
     Route::post('/confirm-payment', [\App\Http\Controllers\Admin\OrdersController::class, 'confirmPayment'])->name('confirm.payment');
     Route::post('/orders/{orderId}/cancel', [\App\Http\Controllers\Admin\OrdersController::class,'cancelOrder']);
     Route::get('orders/show/{id}',[\App\Http\Controllers\Admin\OrdersController::class,'show'])->name('order.show');

     Route::prefix('category')->group(function (){
         Route::get('',[\App\Http\Controllers\Admin\ProductCategoryController::class,'index']);
         Route::get('create',[\App\Http\Controllers\Admin\ProductCategoryController::class,'create']);
         Route::post('store',[\App\Http\Controllers\Admin\ProductCategoryController::class,'store']);
         Route::post('action',[\App\Http\Controllers\Admin\ProductCategoryController::class,'action']);
         Route::get('edit/{id}',[\App\Http\Controllers\Admin\ProductCategoryController::class,'edit']);
         Route::post('edit/update/{id}',[\App\Http\Controllers\Admin\ProductCategoryController::class,'update'])->name('category.update');
         Route::get('delete/{id}',[\App\Http\Controllers\Admin\ProductCategoryController::class,'delete'])->name('delete_category');

     });

     //xử lý product
     Route::prefix('product')->group(function (){
         Route::get('',[\App\Http\Controllers\Admin\ProductController::class,'index']);
         Route::get('create',[\App\Http\Controllers\Admin\ProductController::class,'create']);
         Route::post('store',[\App\Http\Controllers\Admin\ProductController::class,'store']);
         Route::get('edit/{id}',[\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('product.edit');
         Route::post('edit/update/{id}',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('product.update');
         Route::get('show/{id}',[\App\Http\Controllers\Admin\ProductController::class,'show'])->name('product.show');
         Route::post('action',[\App\Http\Controllers\Admin\ProductController::class,'action']);
         Route::get('delete/{id}',[\App\Http\Controllers\Admin\ProductController::class,'delete'])->name('delete_product');
         //xử lý ảnh product

     });

     //xử lý route user
     Route::prefix('user')->group(function (){
         Route::get('',[\App\Http\Controllers\Admin\UsersController::class,'index']);
         Route::get('show/{id}',[\App\Http\Controllers\Admin\UsersController::class,'show'])->name('user.show');
         Route::get('create',[\App\Http\Controllers\Admin\UsersController::class,'create']);
         Route::post('store',[\App\Http\Controllers\Admin\UsersController::class,'store']);
         Route::post('action',[\App\Http\Controllers\Admin\UsersController::class,'action']);
         Route::get('edit/{id}',[\App\Http\Controllers\Admin\UsersController::class,'edit'])->name('user.edit');
         Route::post('edit/update/{id}',[\App\Http\Controllers\Admin\UsersController::class,'update'])->name('user.update');
         Route::get('delete/{id}',[\App\Http\Controllers\Admin\UsersController::class,'delete'])->name('delete_user');
     });


     Route::prefix('login')->group(function (){
         Route::get('',[\App\Http\Controllers\Admin\HomeController::class,'getLogin'])->withoutMiddleware('CheckAdminLogin');
         Route::post('',[\App\Http\Controllers\Admin\HomeController::class,'postLogin'])->withoutMiddleware('CheckAdminLogin');
     });
     Route::get('logout',[\App\Http\Controllers\Admin\HomeController::class,'logout']);

 });



Route::prefix('/cart')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CartController::class,'index']);
    Route::get('add/{id}', [\App\Http\Controllers\Front\CartController::class, 'add']);
});

Route::prefix('/wishlist')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\WishlistController::class,'index']);
    Route::get('addWish/{product}', [\App\Http\Controllers\Front\WishlistController::class, 'addWislist']);
    Route::get('deleteWish/{product}', [\App\Http\Controllers\Front\WishlistController::class, 'deleteWislist']);
});


Route::prefix('/checkout')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CheckoutController::class,'index']);
    Route::post("/",[\App\Http\Controllers\Front\CheckoutController::class,"placeOrder"]);
    Route::post("/update-total",[\App\Http\Controllers\Front\CheckoutController::class,"updateTotal"]);
    Route::get("/thank-you/",[\App\Http\Controllers\Front\CheckoutController::class,"thankYou"]);
    Route::get('/success-transaction/{order}', [\App\Http\Controllers\Front\CheckoutController::class, 'successTransaction'])->name('successTransaction');
    Route::get('/cancel-transaction/{order}', [\App\Http\Controllers\Front\CheckoutController::class, 'cancelTransaction'])->name('cancelTransaction');
});

Route::prefix('account')->group(function () {
    Route::get('/',[\App\Http\Controllers\Front\AccountController::class,'myAccount']);
    Route::get('login',[\App\Http\Controllers\Front\AccountController::class,'login']);
    Route::post('login',[\App\Http\Controllers\Front\AccountController::class,'checkLogin']);
    Route::get('register',[\App\Http\Controllers\Front\AccountController::class,'register']);
    Route::post('register',[\App\Http\Controllers\Front\AccountController::class,'postRegister']);
    Route::get('logout',[\App\Http\Controllers\Front\AccountController::class,'logout']);
    Route::post('update-info',[\App\Http\Controllers\Front\AccountController::class,'updateInfo']);
    Route::get('/order/{order_code}',[\App\Http\Controllers\Front\AccountController::class,'orderDetail']);

});
Route::prefix('/review')->group(function (){
    Route::get('/{orderDetail:order_code}',[\App\Http\Controllers\Front\ReviewController::class,'index']);
    Route::post('/store',[\App\Http\Controllers\Front\ReviewController::class,'store']);
});

Route::prefix('/about-us')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\AboutUsController::class,'index']);
});
