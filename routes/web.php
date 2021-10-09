<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdmController;


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
    return view('welcome');
});

Route::post('/auth/save', [UserController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [UserController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [UserController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/auth/login', [UserController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [UserController::class, 'register'])->name('auth.register');
    Route::get('/profile', [UserController::class, 'profile'])->name('auth.profile');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [UserController::class, 'settings']);
    Route::get('/profile', [UserController::class, 'profile']);

    Route::get('/products', [ProductController::class, 'getProducts'])->name('products');


    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

    Route::post('/product/pagSession', [ProductController::class, 'pagSession'])->name('buyer.session');

    Route::post('/product/buy', [ProductController::class, 'buy'])->name('product.buy');

    Route::get('/cart', [CartController::class, 'getCart']);
    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::post('/cart/delete', [CartController::class, 'removeFromCart']);
    Route::post('/cart/clear', [CartController::class, 'clear']);

});

