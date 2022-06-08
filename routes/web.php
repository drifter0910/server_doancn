<?php

use App\Http\Controllers\AdLoginController;
use App\Http\Controllers\CheckoutConrtoller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Checkout;
use Illuminate\Support\Facades\Route;
use App\Models\Product;


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

Route::get('/', function () {
    return view('login');
});

// Login
Route::get('/adminlogin', function () {
    return view('login');
});
Route::post('/adminlogin', [UserController::class, 'adminLogin']);
Route::post('/registeradmin', [AdLoginController::class, 'registeradmin']);
// ADD PRODUCT
Route::get('/addproduct', function () {
    return view('layouts.addproduct');
})->name('addproduct');

// All product
Route::get('/allproduct', function () {
    $products = Product::paginate(10);
    return view('layouts.allproduct', compact('products'));
})->name('allproduct');
// Newfeeds
Route::get('/addnewfeed', function () {
    return view('layouts.addnewfeed');
})->name('addnewfeed');
// EDIT PRODUCT
Route::get('/editproduct', function () {
    return view('layouts.editproduct');
})->name('editproduct');

// CHECK OUT
Route::get('/checkout', function () {
    $checkouts = Checkout::paginate(10);
    return view('layouts.checkout', compact('checkouts'));
})->name('checkout');

Route::get('/deletecheckout/{id}', [CheckoutConrtoller::class, 'deletecheckout']);
Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteproduct']);




// ADD BANNER
Route::get('/addbanner', function () {
    return view('layouts.addbanner');
})->name('addbanner');


// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
