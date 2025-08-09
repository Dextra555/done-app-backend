<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\web_b2c\CategoryController as ProductCategoryController;
use App\Http\Controllers\web_b2c\ProductController as WebB2CProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web_b2c\HomeController;
use Illuminate\Support\Facades\Artisan;
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

// Public Routes (accessible by all users)
Route::get('/', [HomeController::class, 'index'])->name('home'); // Home page
Route::get('/shop/category/{slug}', [WebB2CProductController::class, 'getProductsByCategory'])->name('shop.category'); // Products by category
Route::get('shop/category/product/{id}', [WebB2CProductController::class, 'show'])->name('shop.category.product'); // Product details by category
Route::get('product/{id}', function () { return view('user.product_details'); })->name('product.details'); // Product details page
Route::get('products/{category:slug}', [ProductController::class, 'show'])->name('products.show'); // Products by category

Route::get('/shop/category/{slug}/inspiration', [WebB2CProductController::class, 'getInspirationByCategory']); // Inspiration Products by category

Route::get('home-two', function () { return view('user.index_two'); })->name('home.two'); // Alternate home page two
Route::get('home-three', function () { return view('user.index_three'); })->name('home.three'); // Alternate home page three
Route::get('/shop', function () { return view('user.shop'); })->name('shop'); // Shop page

Route::get('productdetails-two', function () { return view('user.product_details_two'); })->name('product.details.two'); // Product details page two
Route::get('blog', function () { return view('user.blog'); })->name('blog'); // Blog listing page
Route::get('blog-details', function () { return view('user.blog_details'); })->name('blog.details'); // Blog details page
Route::get('contact', function () { return view('user.contact'); })->name('contact'); // Contact page
Route::get('become-seller', function () { return view('user.become_seller'); })->name('become.seller'); // Become seller page


// Authenticated User Routes (only logged-in users)
Route::middleware('auth')->group(function () {
    Route::get('wishlist', function () { return view('user.wishlist'); })->name('wishlist'); // Wishlist page
    Route::get('cart', function () { return view('user.cart'); })->name('cart'); // Cart page
    Route::get('checkout', function () { return view('user.checkout'); })->name('checkout'); // Checkout page
    Route::get('orders', function () { return view('user.orders'); })->name('orders'); // Orders page
    Route::get('order-history', function () { return view('user.order_history'); })->name('order.history'); // Order history page
    Route::get('payment', function () { return view('user.payment'); })->name('payment'); // Payment page
    Route::get('account', function () { return view('user.account'); })->name('account'); // Account page
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Edit profile page
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile action
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete profile action
    Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['verified'])->name('dashboard'); // Dashboard page (verified users)
});

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Cleared!';
}); // Clear cache utility route

require __DIR__ . '/auth.php'; // Authentication routes
