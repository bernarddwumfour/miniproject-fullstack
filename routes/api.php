<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);

//Adding Category
Route::post('/categories/create', [ProductController::class, 'addcategory']);


Route::post('/cart', [CartController::class, 'addToCart']);
Route::get('/cart/{id}', [CartController::class, 'show']);