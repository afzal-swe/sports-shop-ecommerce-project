<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;


// Backend Controller
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SubcategoryController;



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
//     return view('frontend.layouts.app');
// });

Route::get('/',  [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






// Backend Routes....................................................................


// Brands Route Section //
Route::get('/brands',  [BrandController::class, 'index'])->name('brand.index')->middleware(['auth', 'verified']);
Route::get('/brand/create',  [BrandController::class, 'create'])->name('brand.create')->middleware(['auth', 'verified']);
Route::post('/brand/store',  [BrandController::class, 'store'])->name('brand.store')->middleware(['auth', 'verified']);
Route::get('/brand/edit/{id}',  [BrandController::class, 'edit'])->name('brand.edit')->middleware(['auth', 'verified']);
Route::post('/brand/update/{id}',  [BrandController::class, 'update'])->name('brand.update')->middleware(['auth', 'verified']);
Route::get('/brand/active/{id}',  [BrandController::class, 'active'])->name('brand.active')->middleware(['auth', 'verified']);
Route::get('/brand/unactive/{id}',  [BrandController::class, 'unactive'])->name('brand.unactive')->middleware(['auth', 'verified']);
Route::get('/brand/delete/{id}',  [BrandController::class, 'destroy'])->name('brand.destroy')->middleware(['auth', 'verified']);

// Category Route Section //
Route::get('/category',  [CategoryController::class, 'index'])->name('category.index')->middleware(['auth', 'verified']);
Route::get('/category/create',  [CategoryController::class, 'create'])->name('category.create')->middleware(['auth', 'verified']);
Route::post('/category/store',  [CategoryController::class, 'store'])->name('category.store')->middleware(['auth', 'verified']);
Route::get('/category/active/{id}',  [CategoryController::class, 'active'])->name('category.active')->middleware(['auth', 'verified']);
Route::get('/category/unactive/{id}',  [CategoryController::class, 'unactive'])->name('category.unactive')->middleware(['auth', 'verified']);
Route::get('/category/delete/{id}',  [CategoryController::class, 'destroy'])->name('category.destroy')->middleware(['auth', 'verified']);

// Sub-category Route Section //
Route::get('/sub-category',  [SubcategoryController::class, 'index'])->name('subcategory.index')->middleware(['auth', 'verified']);
Route::get('/sub-category/create',  [SubcategoryController::class, 'create'])->name('subcategory.create')->middleware(['auth', 'verified']);









require __DIR__ . '/auth.php';
