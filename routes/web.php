<?php

// use App\Http\Controllers\PagesController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KhaltiController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
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

Route::get('/', [PagesController::class, 'home']);

Route::get('/about-us', [PagesController::class, 'about']);

Route::get('/contact', [PagesController::class, 'contact']);

Route::get('/categoryproduct/{catid}',[PagesController::class,'categoryproduct'])->name('categoryproduct');

Route::get('/{id}/viewproduct', [PagesController::class, 'viewproduct'])->name('viewproduct');
Route::get('/search', [PagesController::class, 'search'])->name('search');

Route::get('/cart', [CartController::class, 'index'])->middleware('auth')->name('cart');


Route::get('/checkout/{id}', [CartController::class, 'checkout'])->middleware('auth')->name('checkout');

Route::post('/khalti/verify', [KhaltiController::class, 'verify'])->name('khalti.verify');

Route::post('/order/store', [OrderController::class, 'store'])->middleware('auth')->name('order.store');

Route::post('/addtocart', [CartController::class, 'store'])->middleware('auth')->name('addtocart');

Route::middleware(['auth','isadmin'])->group(function(){

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');

Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');

Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');

Route::get('/category/{id}/delete',[CategoryController::class,'delete'])->name('category.delete');

//Route::post('/rate', [RatingController::class, 'store'])->middleware('auth');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store')->middleware('auth');


//Product
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{id}/update',[ProductController::class,'update'])->name('product.update');
Route::get('/product/{id}/delete',[ProductController::class,'delete'])->name('product.delete');
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');
Route::get('/product/{id}/rate', [ProductController::class, 'rating'])->name('product.rating');

//User
Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

//order
Route::get('/orders',[OrderController::class,'index'])->name('order.index');
Route::get('/order/{id}/status/{status}',[OrderController::class,'status'])->name('order.status');

});

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'isadmin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__ . '/auth.php';