<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ContactController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ConfigurationController;

Route::post('/register', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'login']);

// protect routes
// use Header "authorization: Bearer $token" after login
Route::middleware('auth:sanctum')->group(function () {
    Route::post("/logout", [UserController::class, 'login']);
    
    Route::apiResource('/post',PostController::class);
    Route::apiResource('/profile',ProfileController::class);
    Route::apiResource('/user',UserController::class);
    Route::apiResource('/configuration',ConfigurationController::class);
});
