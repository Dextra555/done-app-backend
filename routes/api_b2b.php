<?php

use App\Http\Controllers\Api\B2B\AuthController;
use App\Http\Controllers\Api\B2B\ForgotPasswordController;
use App\Http\Controllers\Api\B2B\AttributeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\B2B\VideoController;
/*
|--------------------------------------------------------------------------
| B2B API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register B2B API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api/b2b" middleware group. Make something great!
|
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/b2b/profile/{id}', [AuthController::class, 'getProfile']);
Route::post('/profile', [AuthController::class, 'fetchProfile']);
Route::post('/edit-profile', [AuthController::class, 'editProfile']);

// Attribute routes
Route::get('/attributes', [AttributeController::class, 'index']);
Route::get('/attributes/{id}', [AttributeController::class, 'show']);
Route::get('/attributes/{attributeId}/values', [AttributeController::class, 'getValues']);
Route::get('/attributes/{attributeId}/sub-attributes', [AttributeController::class, 'getSubAttributes']);
Route::get('/attributes/search', [AttributeController::class, 'search']);
Route::post('/attributes/combinations', [AttributeController::class, 'getCombinations']);
Route::get('/attributes/with-usage-stats', [AttributeController::class, 'getWithUsageStats']);
Route::get('/attributes/popular', [AttributeController::class, 'getPopular']);

Route::get('/videos', [VideoController::class, 'index']);
Route::put('/videos/{id}', [VideoController::class, 'update']);

Route::get('/videos', [VideoController::class, 'index']);          // List all videos
Route::get('/videos/{id}', [VideoController::class, 'show']);      // Get single video
Route::post('/videos', [VideoController::class, 'store']);         // Create video
Route::put('/videos/{id}', [VideoController::class, 'update']);



// File access route
Route::get('/documents/{path}', function ($path) {
    $filePath = 'b2b/documents/' . $path;
    
    if (!Storage::disk('public')->exists($filePath)) {
        abort(404);
    }
    
    return response()->file(Storage::disk('public')->path($filePath));
})->where('path', '.*')->name('b2b.documents');

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});

//chitti api's
Route::post('/forgot-passwords', [ForgotPasswordController::class, 'sendOtp']);
Route::post('/verify-otps', [ForgotPasswordController::class, 'verifyOtp']);
Route::post('/reset-passwords', [ForgotPasswordController::class, 'resetPassword']);


