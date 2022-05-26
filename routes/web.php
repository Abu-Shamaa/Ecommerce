<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Frontend\FrontendController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartContoller;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'category']);
Route::get('/view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('/category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productView']);

Route::get('/product-list', [FrontendController::class, 'productlistAjax']);
Route::post('/searchproduct', [FrontendController::class, 'searchProduct']);

 Auth::routes();

// //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/add-to-cart', [CartContoller::class, 'addtocart']);
Route::post('/delete-cart-item', [CartContoller::class, 'deletecart']);
Route::post('/update-cart', [CartContoller::class, 'updatecart']);
Route::get('/load-cart-data', [CartContoller::class, 'cartcount']);
Route::post('/add-to-wishlist', [WishlistController::class, 'Addwishlist']);
Route::post('/delete-wishlist-item', [WishlistController::class, 'deletewishlist']);
Route::get('/load-wishlist-data', [WishlistController::class, 'wishlistcount']);

Route::middleware(['auth'])->group(function(){
    Route::get('cart', [CartContoller::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'Checkout']);
    Route::post('place-order', [CheckoutController::class, 'placorder']);
    Route::get('my-orders', [UserController::class, 'myorder']);
    Route::get('view-order/{id}', [UserController::class, 'viewOrder']);

    Route::get('wishlist', [WishlistController::class, 'wishindex']);

    Route::get('user-profile',[UserController::class, 'profile']);
    

});


 Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/deleteuser/{id}',[DashboardController::class, 'destroyUser'])->name('deleteUser');

    Route::get('/categories', [CategoryController::class, 'catIndex'])->name('catindex');
    Route::get('/add-category', [CategoryController::class, 'Add'])->name('addcat');
    Route::post('/insert-category', [CategoryController::class, 'Insert'])->name('insert');
    Route::get('/edit/{id}',[CategoryController::class, 'Edit'])->name('editCategory');
    Route::post('/update/{id}',[CategoryController::class, 'Update'])->name('updateCategory');
    Route::get('/delete/{id}',[CategoryController::class, 'destroy'])->name('deleteCategory');

    //products
    Route::get('/products', [ProductController::class, 'productIndex'])->name('productindex');
    Route::get('/product-add', [ProductController::class, 'Addd'])->name('addP');
    Route::post('/sotre-product', [ProductController::class, 'store'])->name('stored');
    Route::get('/edited/{id}',[ProductController::class, 'EditP'])->name('editP');
    Route::post('/updated/{id}',[ProductController::class, 'UpdateP'])->name('updateProduct');
    Route::get('/deleted/{id}',[ProductController::class, 'destroyP'])->name('deleteProduct');

    //orders
    Route::get('/orders', [OrderController::class, 'orderIndex']);
    Route::get('/Admin-view-order/{id}', [OrderController::class, 'orderView']);
    Route::post('/update-order/{id}', [OrderController::class, 'updateOrder']);
    Route::get('/order-history', [OrderController::class, 'orderhistory']);

    

 });