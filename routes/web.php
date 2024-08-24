<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/shop', function () {
//     return view('shop');
// });

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //Category
    Route::prefix('category')->as('category.')->group(function () {
        Route::get("/", [CategoryController::class, "index"])->name('index');
        Route::get("/create", [CategoryController::class, "create"])->name('create');
        Route::post("/create", [CategoryController::class, "store"])->name('store');
        Route::get("/edit/{id}", [CategoryController::class, "edit"])->name('edit');
        Route::put("/edit/{id}", [CategoryController::class, "update"])->name('update');
        Route::delete("/destroy/{id}", [CategoryController::class, "destroy"])->name('destroy');
    });
    //Product
    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/edit/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{product} ', [ProductController::class, 'destroy'])->name('delete');
    });
    //Product
    Route::prefix('color')->as('color.')->group(function () {
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::get('/create', [ColorController::class, 'create'])->name('create');
        Route::post('/create', [ColorController::class, 'store'])->name('store');
        Route::get('/edit/{color}', [ColorController::class, 'edit'])->name('edit');
        Route::put('/edit/{color}', [ColorController::class, 'update'])->name('update');
        Route::delete('/destroy/{color} ', [ColorController::class, 'destroy'])->name('destroy');
    });
    //Product
    Route::prefix('size')->as('size.')->group(function () {
        Route::get('/', [SizeController::class, 'index'])->name('index');
        Route::get('/create', [SizeController::class, 'create'])->name('create');
        Route::post('/create', [SizeController::class, 'store'])->name('store');
        Route::get('/edit/{size}', [SizeController::class, 'edit'])->name('edit');
        Route::put('/edit/{size}', [SizeController::class, 'update'])->name('update');
        Route::delete('/destroy/{size} ', [SizeController::class, 'destroy'])->name('destroy');
    });
});
// Client
Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('category/{category}', [ClientProductController::class, 'list'])->name('page.category.list');
Route::get('product/{slug}', [ClientProductController::class, 'detail'])->name('page.product.detail');
Route::post('/addtocart', [CartController::class, 'addToCart'])->name('page.addToCart');
Route::get('/cart', [CartController::class, 'index'])->name('page.cart');
Route::get('/checkout', [OrderController::class, 'create'])->name('page.viewCheckOut');
Route::post('/checkout', [OrderController::class, 'store'])->name('page.checkout');
