<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\AttributeController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// Protected Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Product Routes
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('show');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
        Route::patch('/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('toggle-status');
        Route::post('/bulk-action', [ProductController::class, 'bulkAction'])->name('bulk-action');

        
        // Product Variant Routes
        Route::prefix('{product}/variants')->name('variants.')->group(function () {
            Route::get('/', [ProductVariantController::class, 'index'])->name('index');
            Route::get('/create', [ProductVariantController::class, 'create'])->name('create');
            Route::post('/', [ProductVariantController::class, 'store'])->name('store');
            Route::get('/{variant}', [ProductVariantController::class, 'show'])->name('show');
            Route::get('/{variant}/edit', [ProductVariantController::class, 'edit'])->name('edit');
            Route::put('/{variant}', [ProductVariantController::class, 'update'])->name('update');
            Route::delete('/{variant}', [ProductVariantController::class, 'destroy'])->name('destroy');
            Route::patch('/{variant}/toggle-status', [ProductVariantController::class, 'toggleStatus'])->name('toggle-status');
            Route::post('/bulk-update-stock', [ProductVariantController::class, 'bulkUpdateStock'])->name('bulk-update-stock');
            Route::get('/get-attribute-values', [ProductVariantController::class, 'getAttributeValues'])->name('get-attribute-values');
            Route::get('/generate-sku', [ProductVariantController::class, 'generateSku'])->name('generate-sku');
        });
    });

    // Attribute Management Routes
    Route::prefix('attributes')->name('attributes.')->group(function () {
        Route::get('/', [AttributeController::class, 'index'])->name('index');
        Route::get('/create', [AttributeController::class, 'create'])->name('create');
        Route::post('/', [AttributeController::class, 'store'])->name('store');
        Route::get('/{attribute}/edit', [AttributeController::class, 'edit'])->name('edit');
        Route::put('/{attribute}', [AttributeController::class, 'update'])->name('update');
        Route::delete('/{attribute}', [AttributeController::class, 'destroy'])->name('destroy');
        Route::get('/get-attribute-values', [AttributeController::class, 'getAttributeValues'])->name('get-attribute-values');
        
        // AJAX routes for dynamic attribute management
        Route::post('/{attribute}/sub-attributes', [AttributeController::class, 'addSubAttribute'])->name('add-sub-attribute');
        Route::post('/{attribute}/custom-values', [AttributeController::class, 'addCustomValue'])->name('add-custom-value');
        Route::delete('/{attribute}/sub-attributes', [AttributeController::class, 'removeSubAttribute'])->name('remove-sub-attribute');
        Route::delete('/{attribute}/custom-values', [AttributeController::class, 'removeCustomValue'])->name('remove-custom-value');
        
        // New AJAX routes for dynamic variant creation
        Route::post('/add-attribute', [AttributeController::class, 'addAttribute'])->name('add-attribute');
        Route::post('/add-sub-attribute', [AttributeController::class, 'addSubAttributeAjax'])->name('add-sub-attribute-ajax');
        Route::post('/add-attribute-value', [AttributeController::class, 'addAttributeValue'])->name('add-attribute-value');
        Route::post('/add-sub-attribute-value', [AttributeController::class, 'addSubAttributeValue'])->name('add-sub-attribute-value');
    });
});