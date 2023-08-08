<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Auth;
Route::middleware('auth')->group(function () {

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});


// Route for About Us page
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');

// Route for Contact Us page
Route::get('/contactus', [ContactUsController::class, 'index'])->name('contactus');

// Route to show the "Add Category" form
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('cat');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('show2');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Auth::routes();


