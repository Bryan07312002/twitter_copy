<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FeedController;

Route::post('auth/login', [AuthController::class,'login']);
Route::post('auth/register', [AuthController::class,'register']);


Route::middleware('auth:api')->group(function(){
    Route::post('auth/logout', [AuthController::class,'logout']);
    Route::post('auth/refresh',[AuthController::class,'refresh']);
    Route::get('auth/me',[AuthController::class,'me']);

    Route::get('feed',[FeedController::class,'feed']);
    
    Route::apiResource('user',UserController::class);
    Route::apiResource('like',LikeController::class);
    Route::apiResource('post',PostController::class);
});