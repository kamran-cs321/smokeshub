<?php

use Illuminate\Support\Facades\Route;

use App\Models\Category;
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

// Route::get('/', function () {
//     return view('index');
// });

 
Route::POST('/admin/login',[App\Http\Controllers\LoginController::class, 'login']);

Route::GET('/admin',[App\Http\Controllers\LoginController::class, 'index']);

//Admin rOutes
Route::group(['middleware' => 'VerifyAdmin'], function () {

    
Route::POST('/user/update-info',[App\Http\Controllers\Admin\DashboardController::class, 'update_password']);

Route::POST('/show-customer-orders',[App\Http\Controllers\CustomerController::class, 'show_orders']);

Route::POST('/update-customer-status',[App\Http\Controllers\CustomerController::class, 'destroy']);
Route::GET('/admin/customers',[App\Http\Controllers\CustomerController::class, 'index']);

Route::GET('/admin/messages',[App\Http\Controllers\CustomerController::class, 'messages']);

Route::POST('/admin/dashboard',[App\Http\Controllers\LoginController::class, 'dashboard']);

Route::GET('/admin/dashboard',[App\Http\Controllers\LoginController::class, 'dashboard']);

Route::POST('/admin/create',[App\Http\Controllers\LoginController::class, 'store']);

Route::GET('/admin/orders',[App\Http\Controllers\Admin\DashboardController::class, 'orders']);

Route::GET('/admin/orders/canceled',[App\Http\Controllers\Admin\DashboardController::class, 'canceled']);

Route::GET('/admin/product/create',[App\Http\Controllers\Admin\ProductController::class, 'new']);

Route::POST('/admin/product/store',[App\Http\Controllers\Admin\ProductController::class, 'store']);

Route::GET('/admin/products',[App\Http\Controllers\Admin\ProductController::class, 'products']);

Route::POST('/update-product-status',[App\Http\Controllers\Admin\ProductController::class, 'update_status']);

Route::POST('/update-order-status',[App\Http\Controllers\Admin\DashboardController::class, 'update_status']);


Route::get('/admin/logout',function(){

    Session::flush('user'); // removes all session data

    return redirect('/admin');
});

});

// public routes

Route::GET('/contact',function(){
    $categories = Category::all();
    return view('store.contact',compact('categories'));
});


Route::get('/', [App\Http\Controllers\ProductController::class, 'index']);  

Route::GET('/products-category/{category}',[App\Http\Controllers\ProductController::class, 'show_category_product']);


Route::GET('/products-list',[App\Http\Controllers\ProductController::class, 'products']);

Route::POST('/user/contact', [App\Http\Controllers\ProductController::class, 'contact']);

Route::POST('/user/order-now', [App\Http\Controllers\ProductController::class, 'order_now']);


Route::POST('/user/subscribe', [App\Http\Controllers\ProductController::class, 'subscribe']);


Route::get('/checkout-details-info', [App\Http\Controllers\ProductController::class, 'checkout']); 

Route::get('/order-now', [App\Http\Controllers\ProductController::class, 'order_view']); 


Route::get('cart', [ProductController::class, 'cart'])->name('cart');
//  Route::get('add-to-cart/{id}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('add.to.cart');
Route::GET('/add-to-cart/{id}', [App\Http\Controllers\ProductController::class, 'add_To_Cart']);

Route::GET('/remove-from-cart/{id}', [App\Http\Controllers\ProductController::class, 'remove_from_Cart']);

Route::GET('/remove-product-cart/{id}', [App\Http\Controllers\ProductController::class, 'remove_product_Cart']);


Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');

Route::POST('/search-product-info',[App\Http\Controllers\ProductController::class, 'search_products']);

Route::GET('/fetch-cart-info', [App\Http\Controllers\ProductController::class, 'show_Cart']);


Route::POST('/fetch-product-info', [App\Http\Controllers\ProductController::class, 'show_product_info']);


Route::get('/product-info/{slug}', [App\Http\Controllers\ProductController::class, 'product_info']);

Route::get('/about', function(){
    $categories = Category::all();
    return view('store.why_us',compact('categories'));
});

Route::get('/terms-and-conditions', function(){
    $categories = Category::all();
    return view('store.terms_of_services',compact('categories'));
});

Route::get('/flush',function(){

    $val = Session::flush(); // removes all session data
    return $val;
});

//  Route::get('/{page}', 'AdminController@index');

