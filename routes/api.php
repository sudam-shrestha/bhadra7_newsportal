<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("latest-article", [ApiController::class, "latest_article"]);
Route::get("advertises", [ApiController::class, "advertises"]);

// Category Routes
Route::middleware("auth:sanctum")->group(function () {
    Route::get("categories", [CategoryController::class, "categories"]);

    Route::middleware("admin")->group(function () {
        Route::post("category/store", [CategoryController::class, "store"]);
        Route::patch("category/update/{id}", [CategoryController::class, "update"]);
    });

    
    Route::get("category/{slug}", [CategoryController::class, "category"]);
});

// Auth Routes
Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);
