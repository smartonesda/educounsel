<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MateriController;
use App\Http\Controllers\Api\KuesionerController;
use App\Http\Controllers\Api\NotificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// API Version 1
Route::prefix('v1')->group(function () {
    
    // Public routes (no authentication required)
    Route::post('/auth/login', [AuthController::class, 'login']);
    
    // Protected routes (require authentication)
    Route::middleware(['auth:sanctum'])->group(function () {
        
        // Authentication routes
        Route::prefix('auth')->group(function () {
            Route::get('/me', [AuthController::class, 'me']);
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::post('/logout-all', [AuthController::class, 'logoutAll']);
            Route::post('/refresh', [AuthController::class, 'refresh']);
        });
        
        // Materi routes
        Route::apiResource('materi', MateriController::class);
        Route::post('/materi/{id}/toggle-status', [MateriController::class, 'toggleStatus']);
        
        // Kuesioner routes
        Route::apiResource('kuesioner', KuesionerController::class);
        Route::post('/kuesioner/{id}/submit', [KuesionerController::class, 'submit']);
        Route::get('/kuesioner/{id}/results', [KuesionerController::class, 'results']);
        
        // Notification routes
        Route::prefix('notifications')->group(function () {
            Route::get('/', [NotificationController::class, 'index']);
            Route::get('/unread', [NotificationController::class, 'unread']);
            Route::get('/count', [NotificationController::class, 'count']);
            Route::post('/{id}/read', [NotificationController::class, 'markAsRead']);
            Route::post('/read-all', [NotificationController::class, 'markAllAsRead']);
            Route::delete('/{id}', [NotificationController::class, 'destroy']);
        });
        
    });
});

// Legacy routes for backward compatibility (using web middleware)
Route::middleware(['web', 'auth'])->prefix('api')->group(function () {
    Route::get('/notifications/unread', [\App\Http\Controllers\NotificationController::class, 'getUnread']);
    Route::get('/notifications/count', [\App\Http\Controllers\NotificationController::class, 'getUnreadCount']);
    Route::get('/notifications/check-new', [\App\Http\Controllers\NotificationController::class, 'checkNew']);
    Route::post('/notifications/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markAsRead']);
    Route::post('/notifications/read-all', [\App\Http\Controllers\NotificationController::class, 'markAllAsRead']);
});
