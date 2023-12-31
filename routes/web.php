<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

// Backend Controller
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SlicerController;
use App\Http\Controllers\Backend\AddToCartController;

//Frontend Controller
use App\Http\Controllers\Frontend\FCategoryController;
use App\Http\Controllers\Frontend\ProductDetailsController;
use App\Http\Controllers\Frontend\Add_To_CartController;
use App\Http\Controllers\Frontend\CheckoutController;



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
Route::get('/redirect',  [HomeController::class, 'login_function'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






// Backend Routes....................................................................Start


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
Route::get('/category/edit/{id}',  [CategoryController::class, 'edit'])->name('category.edit')->middleware(['auth', 'verified']);
Route::post('/category/update/{id}',  [CategoryController::class, 'update'])->name('category.update')->middleware(['auth', 'verified']);
Route::get('/category/active/{id}',  [CategoryController::class, 'active'])->name('category.active')->middleware(['auth', 'verified']);
Route::get('/category/unactive/{id}',  [CategoryController::class, 'unactive'])->name('category.unactive')->middleware(['auth', 'verified']);
Route::get('/category/delete/{id}',  [CategoryController::class, 'destroy'])->name('category.destroy')->middleware(['auth', 'verified']);

// Sub-category Route Section //
Route::get('/sub-category',  [SubcategoryController::class, 'index'])->name('subcategory.index')->middleware(['auth', 'verified']);
Route::get('/sub-category/create',  [SubcategoryController::class, 'create'])->name('subcategory.create')->middleware(['auth', 'verified']);
Route::post('/sub-category/store',  [SubcategoryController::class, 'store'])->name('subcategory.store')->middleware(['auth', 'verified']);
Route::get('/sub-category/active/{id}',  [SubcategoryController::class, 'active'])->name('subcategory.active')->middleware(['auth', 'verified']);
Route::get('/sub-category/unactive/{id}',  [SubcategoryController::class, 'unactive'])->name('subcategory.unactive')->middleware(['auth', 'verified']);
Route::get('/sub-category/delete/{id}',  [SubcategoryController::class, 'destroy'])->name('subcategory.destroy')->middleware(['auth', 'verified']);

// Products Route Section //
Route::get('/products',  [ProductController::class, 'index'])->name('product.index')->middleware(['auth', 'verified']);
Route::get('/product/create',  [ProductController::class, 'create'])->name('product.create')->middleware(['auth', 'verified']);
Route::post('/product/store',  [ProductController::class, 'store'])->name('product.store')->middleware(['auth', 'verified']);
Route::get('/product/delete/{id}',  [ProductController::class, 'destroy'])->name('product.destroy')->middleware(['auth', 'verified']);
Route::get('/product/active/{id}',  [ProductController::class, 'active'])->name('product.active')->middleware(['auth', 'verified']);
Route::get('/product/unactive/{id}',  [ProductController::class, 'unactive'])->name('product.unactive')->middleware(['auth', 'verified']);
Route::get('/product/edit/{id}',  [ProductController::class, 'edit'])->name('product.edit')->middleware(['auth', 'verified']);
Route::post('/product/update/{id}',  [ProductController::class, 'update'])->name('product.update')->middleware(['auth', 'verified']);

// Products Route Section //
Route::get('/slider',  [SlicerController::class, 'index'])->name('slider.index')->middleware(['auth', 'verified']);
Route::get('/slider/create',  [SlicerController::class, 'create'])->name('slider.create')->middleware(['auth', 'verified']);
Route::post('/slider/store',  [SlicerController::class, 'store'])->name('slider.store')->middleware(['auth', 'verified']);
Route::get('/slider/delete/{id}',  [SlicerController::class, 'destroy'])->name('slider.destroy')->middleware(['auth', 'verified']);
Route::get('/slider/active/{id}',  [SlicerController::class, 'active'])->name('slider.active')->middleware(['auth', 'verified']);
Route::get('/slider/unactive/{id}',  [SlicerController::class, 'unactive'])->name('slider.unactive')->middleware(['auth', 'verified']);

// Add To Cart Route Section //
Route::get('/all/cart',  [AddToCartController::class, 'index'])->name('cart.index')->middleware(['auth', 'verified']);

// Backend Routes....................................................................End


// Frontend Routes....................................................................Start

// Category relative Product Show Route Section //
Route::get('/category/product/{id}',  [FCategoryController::class, 'show_category_product'])->name('category.show')->middleware(['auth', 'verified']);

// Product Details Route Section //
Route::get('/product/details/{id}',  [ProductDetailsController::class, 'product_details'])->name('product.details');

// Product Add To Cart Route Section //
Route::post('/product/add-to-cart/{id}',  [Add_To_CartController::class, 'add_to_cart'])->name('add_to_cart')->middleware(['auth', 'verified']);
Route::get('/add/cart',  [Add_To_CartController::class, 'cart_view'])->name('cart.view')->middleware(['auth', 'verified']);
Route::get('/cart/cancel/{id}',  [Add_To_CartController::class, 'destroy'])->name('product.destroy')->middleware(['auth', 'verified']);

// Product Add To Cart Route Section //
Route::get('/chackout',  [CheckoutController::class, 'chackout_login'])->name('chackout.login');
Route::post('/shipping',  [CheckoutController::class, 'shipping'])->name('shipping.create')->middleware(['auth', 'verified']);

// Payment Route Section //
Route::get('/payment',  [CheckoutController::class, 'payment'])->name('payment')->middleware(['auth', 'verified']);










require __DIR__ . '/auth.php';
