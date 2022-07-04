<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;


// Route::get('/products',[ProductController::class,'index']);
// Route::post('/products',[ProductController::class,'store']);

// Route::resource('products', ProductController::class);



//Public Routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);
Route::get('/products/search/{name}',[ProductController::class,'search']);


//Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::delete('/products/{id}',[ProductController::class,'delete']);
    Route::post('/logout',[AuthController::class,'logout']);
});

