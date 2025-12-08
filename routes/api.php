<?php

use App\Http\Controllers\api\adminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\api\blogController;
use App\Http\Controllers\api\galleryController;
use App\Http\Controllers\api\LpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/gallery', galleryController::class);
    Route::apiResource('/blog', blogController::class);
    Route::middleware('ability:super-access')->group(function () {
        Route::apiResource('/admin', adminController::class);
        Route::get('/landingpage', [lpController::class, 'index']);
        Route::post('/landingpage/s1h1', [lpController::class, 'up_s1h1']);
        Route::post('/landingpage/s1p2', [lpController::class, 'up_s1p1']);
        Route::post('/landingpage/s2h1', [lpController::class, 'up_s2h1']);
        Route::post('/landingpage/s2p1', [lpController::class, 'up_s2p1']);
        Route::post('/landingpage/s3h1', [lpController::class, 'up_s3h1']);
        Route::post('/landingpage/s3p1', [lpController::class, 'up_s3p1']);
        Route::post('/landingpage/fp1', [lpController::class, 'up_fp1']);
        Route::post('/landingpage/link', [lpController::class, 'up_link']);
    });
}); 

