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

use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');


use App\Http\Controllers\AboutController;
Route::get('/about', [AboutController::class, 'index'])->name('about');


use App\Http\Controllers\ContactController;
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

use App\Http\Controllers\ProductController;
Route::resource('products', ProductController::class);

use App\Http\Controllers\CategoryController;
Route::get('/categories', [CategoryController::class, 'index'])->name('cat');
// routes/web.php

Route::get('/products', [ProductController::class, 'index'])->name('products.index');


Route::get('/products', [ProductController::class, 'index'])->name('products');
