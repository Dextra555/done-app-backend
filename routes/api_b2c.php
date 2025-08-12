<?php

use App\Http\Controllers\Api\B2C\AuthController; 
use App\Http\Controllers\Api\B2C\ServiceVideoController;
use App\Http\Controllers\Api\B2C\CategoryController;
use App\Http\Controllers\Api\B2C\ProductController;
use App\Http\Controllers\Api\B2C\ProductVariantController;
use App\Http\Controllers\Api\B2C\ProductVariantReviewController;
use App\Http\Controllers\Api\B2C\AttributeController;
use App\Http\Controllers\Api\B2C\NotificationController;
use App\Http\Controllers\Api\B2C\CartController;
use App\Http\Controllers\Api\B2C\OrderController;
use App\Http\Controllers\Api\B2C\SegmentController;
use App\Http\Controllers\Api\B2C\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes (no authentication required)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'sendOtp']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

// Public category routes
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::get('/categories/slug/{slug}', [CategoryController::class, 'showBySlug']);
Route::get('/categories/search', [CategoryController::class, 'search']);

// Segment routes
Route::get('/segments', [SegmentController::class, 'index']);
Route::get('/segments/{segmentId}/products', [SegmentController::class, 'products']);
Route::get('/home-data', [SegmentController::class, 'getHomeData']);


// Public product routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/category/{categoryId}', [ProductController::class, 'getByCategory']);
Route::get('/category/product/{categorySlug}', [ProductController::class, 'getByCategorySlug']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/{id}/basic', [ProductController::class, 'showBasic']);
Route::get('/products/{id}/attributes', [ProductController::class, 'showAttributes']);
Route::get('/products/{id}/reviews', [ProductController::class, 'showReviews']);

// Product attribute routes
Route::get('/products/{productId}/product-variants-color-attributes', [ProductController::class, 'getProductAttributes']);
Route::get('/products/{productId}/product-variants', [ProductController::class, 'getProductVariants']);
Route::get('/products/{productId}/attribute-combinations', [ProductController::class, 'getAttributeCombinations']);
Route::post('/products/filter-by-attributes', [ProductController::class, 'filterByAttributes']);

// New attribute-based product/variant selection routes
Route::post('/products/{productId}/variants/by-selected-attributes', [ProductController::class, 'getVariantsBySelectedAttributes']);
Route::post('/products/{productId}/available-attribute-values', [ProductController::class, 'getAvailableAttributeValues']);
Route::post('/products/{productId}/configuration', [ProductController::class, 'getProductConfiguration']);
Route::post('/products/{productId}/variant/by-exact-attributes', [ProductController::class, 'getVariantByExactAttributes']);

// Product variant routes
Route::get('/products/{productId}/variants', [ProductVariantController::class, 'index']);
Route::get('/products/{productId}/variants/{variantId}', [ProductVariantController::class, 'show']);
Route::post('/products/{productId}/variants/by-attributes', [ProductVariantController::class, 'getByAttributes']);
Route::get('/products/{productId}/variants/attribute-combinations', [ProductVariantController::class, 'getAttributeCombinations']);
Route::get('/products/{productId}/variants/by-price-range', [ProductVariantController::class, 'getByPriceRange']);
Route::get('/products/{productId}/variants/{variantId}/stock-status', [ProductVariantController::class, 'getStockStatus']);

// Product variant review routes
Route::get('/products/{productId}/variants/{variantId}/reviews', [ProductVariantReviewController::class, 'index']);
Route::get('/products/{productId}/variants/{variantId}/reviews/{reviewId}', [ProductVariantReviewController::class, 'show']);
Route::post('/products/{productId}/variants/{variantId}/reviews', [ProductVariantReviewController::class, 'store']);
Route::put('/products/{productId}/variants/{variantId}/reviews/{reviewId}', [ProductVariantReviewController::class, 'update']);
Route::delete('/products/{productId}/variants/{variantId}/reviews/{reviewId}', [ProductVariantReviewController::class, 'destroy']);
Route::post('/products/{productId}/variants/{variantId}/reviews/{reviewId}/helpful', [ProductVariantReviewController::class, 'markHelpful']);


// Public attribute routes
Route::get('/attributes', [AttributeController::class, 'index']);
Route::get('/attributes/{id}', [AttributeController::class, 'show']);
Route::get('/attributes/{attributeId}/values', [AttributeController::class, 'getValues']);
Route::get('/attributes/{attributeId}/sub-attributes', [AttributeController::class, 'getSubAttributes']);
Route::get('/attributes/search', [AttributeController::class, 'search']);
Route::post('/attributes/combinations', [AttributeController::class, 'getCombinations']);

// Public service routes
Route::get('/services', [ServiceVideoController::class, 'index']);
Route::get('/services/featured', [ServiceVideoController::class, 'featured']);
Route::get('/services/search', [ServiceVideoController::class, 'search']);
Route::get('/services/{id}', [ServiceVideoController::class, 'show']);
Route::get('/services/{serviceId}/videos/{videoId}', [ServiceVideoController::class, 'showVideo']);

// Protected routes (authentication required)
Route::middleware('auth:sanctum')->group(function () {
    
    // Auth routes
    Route::post('/profile', [AuthController::class, 'profile']);
    Route::post('/edit-profile', [AuthController::class, 'editProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
       
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::post('/profile', [ProfileController::class, 'update']);
    Route::post('/profile/password', [ProfileController::class, 'updatePassword']);
 
    
    // Category routes
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store'])->middleware('throttle:60,1');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->middleware('throttle:60,1');
    Route::get('/categories/search', [CategoryController::class, 'search']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);

    // Product review routes
    Route::get('/products/{id}/reviews', [ProductController::class, 'getReviews']);
    Route::post('/products/{id}/reviews', [ProductController::class, 'addReview']);
    
    // Cart routes
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'addItem']);
    Route::put('/cart/items/{itemId}', [CartController::class, 'updateItem']);
    Route::post('/cart/update', [CartController::class, 'updateByProduct']);
    Route::delete('/cart/items/{itemId}', [CartController::class, 'removeItem']);
    Route::post('/cart/remove', [CartController::class, 'removeByProduct']);
    Route::delete('/cart/remove', [CartController::class, 'clear']);
    Route::get('/cart/summary', [CartController::class, 'summary']);
    
    // Order routes
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/order/place', [OrderController::class, 'store']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel']);
    Route::get('/orders/{id}/track', [OrderController::class, 'track']);
    Route::get('/orders/statistics', [OrderController::class, 'statistics']);
    
    // Service comment routes
    Route::post('/services/{serviceId}/videos/{videoId}/comments', [ServiceVideoController::class, 'addComment']);
    
    // Notification routes
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::get('/notifications/{id}', [NotificationController::class, 'show']);
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy']);
    Route::delete('/notifications', [NotificationController::class, 'clearAll']);
    Route::get('/notifications/statistics', [NotificationController::class, 'statistics']);
});

Route::get('/products/{product}/story', [\App\Http\Controllers\Api\B2C\ProductStoryController::class, 'showByProduct']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    
    // Public story routes
    Route::get('/stories', [\App\Http\Controllers\Api\B2C\ProductStoryController::class, 'index']);
    Route::post('/stories/{story}', [\App\Http\Controllers\Api\B2C\ProductStoryController::class, 'showWithComments']);

    // Product Stories Management
    Route::post('/products/{product}/stories', [\App\Http\Controllers\Api\B2C\ProductStoryController::class, 'store']);
    Route::post('/stories/{story}/view', [\App\Http\Controllers\Api\B2C\ProductStoryController::class, 'recordView']);
    
    // Story Comments
    Route::get('/stories/{story}/comments', [\App\Http\Controllers\Api\B2C\StoryCommentController::class, 'index']);
    Route::post('/stories/{story}/comments', [\App\Http\Controllers\Api\B2C\StoryCommentController::class, 'store']);
    Route::put('/comments/{comment}', [\App\Http\Controllers\Api\B2C\StoryCommentController::class, 'update']);
    Route::delete('/comments/{comment}', [\App\Http\Controllers\Api\B2C\StoryCommentController::class, 'destroy']);
});

    