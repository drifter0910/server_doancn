<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\CheckoutConrtoller;
use App\Http\Controllers\NewFeedsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// User
Route::get('getuser', [UserController::class, 'getuser']);
Route::post('updateuser/{id}', [UserController::class, 'updateUser']);

// Product
Route::get('getproduct', [ProductController::class, 'getProduct']);
Route::get('getbanner', [ProductController::class, 'getBanner']);


Route::get('getproduct/{id}', [ProductController::class, 'getProductById']);
// Route::get('getproduct/{category}', [ProductController::class, 'getProductByCategory']);


Route::post('addproduct', [ProductController::class, 'addproduct']);
Route::post('addbanner', [ProductController::class, 'addbanner']);

// Checkout
Route::post('checkout', [CheckoutConrtoller::class, 'checkout']);
Route::get('getorder/{userid}', [CheckoutConrtoller::class, 'getorder']);

// Newfeeds
Route::post('addnewfeed', [NewFeedsController::class, 'addnewfeed']);
Route::get('getnewfeed', [NewFeedsController::class, 'getnewfeed']);






// Route::post('register',[UserController::class, 'register']);

Route::post('user-register', [UserController::class, 'userSignUp']);
Route::post('user-login', [UserController::class, 'userLogin']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'user']);
    Route::post('logout', [UserController::class, 'logout']);
});
