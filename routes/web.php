<?php
 
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CakesController; 


Route::get('/', function () {
    return view('welcome');
});

Route::get('/signaturecake', function () {
    return view('cake.signaturecake');
});


Auth::routes();
   
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:manager'])->group(function () {
   
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


// Cakes Routes Lisst

Route::get('/shopping', [CakesController::class, 'index']); 
Route::get('/shopping-cart', [CakesController::class, 'cakeCart'])->name('shopping.cart');
Route::get('/cake/{id}', [CakesController::class, 'addCaketoCart'])->name('addcake.to.cart');
Route::patch('/update-shopping-cart', [CakesController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [CakesController::class, 'deleteProduct'])->name('delete.cart.product');
