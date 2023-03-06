<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistarationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['guest'])->group(function () {

    Route::get('/login', function () {
        return view('login');
    })->name("login");
    
    Route::get('/registration', function () {
        return view('registration');
    })->name("registration");
    
    Route::post('/login', [LoginController::class, 'login'])->name("login");
    
    Route::post('/registation_customer', [RegistarationController::class, 'registation_customer'])->name("registation_customer");
    
    Route::post('/registation_seller', [RegistarationController::class, 'registation_seller'])->name("registation_seller");

});

Route::middleware(['auth'])->group(function () {

    Route::get('/', [ProductController::class, 'index']);

    Route::get('/home', [ProductController::class, 'index']);

    Route::post('/product_create', [ProductController::class, 'product_create'])->name("product_create");
    
    Route::get('/my_products', [ProductController::class, 'my_products'])->name("my_products");
    
    Route::post('/search_product', [ProductController::class, 'search_product'])->name("search_product");

    Route::get('/search_history', [HistoryController::class, 'index'])->name("search_history");

    Route::get('/get_history_market', [HistoryController::class, 'get_history_market'])->name("get_history_market");
    
    Route::get('/product_create', function () {
        return view('product.create');
    });

    Route::get('/logout', function(){

        Auth::guard('web')->logout();

        return redirect('login');
    });
 
});