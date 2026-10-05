<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("categories", [ApiController::class,"categories"]);
Route::get("latest-article", [ApiController::class,"latest_article"]);
Route::get("advertises", [ApiController::class,"advertises"]);