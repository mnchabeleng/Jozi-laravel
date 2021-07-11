<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ListingController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\CommentController;

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::middleware(['cors'])->group(function () {
    Route::get('/', [ApiController::class, 'index'])->name('api');
    
    Route::get('/users', [UserController::class, 'index'])->name('api.users');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('api.users.show');
    
    Route::get('/listings', [ListingController::class, 'index'])->name('api.listings');
    Route::get('/listings/{slug}', [ListingController::class, 'show'])->name('api.listings.show');
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('api.categories');
    Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('api.categories.show');
    
    Route::get('/locations', [LocationController::class, 'index'])->name('api.locations');
    Route::get('/locations/{id}', [LocationController::class, 'show'])->name('api.locations.show');
    
    Route::get('/images', [ImageController::class, 'index'])->name('api.images');
    Route::get('/imagevs/{id}', [ImageController::class, 'show'])->name('api.images.show');

    Route::get('/comments', [CommentController::class, 'index'])->name('api.comments');
});