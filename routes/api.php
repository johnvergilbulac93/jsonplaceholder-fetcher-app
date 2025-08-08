<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::apiResource('users', UserController::class);
// Route::apiResource('posts', PostsController::class);


Route::controller(PostsController::class)->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{posts}', 'update');
        Route::patch('/{posts}', 'patch');
        Route::delete('/{posts}', 'destroy');
        Route::get('/{posts}', 'show');
        Route::get('/{posts}/comments', 'posts');
    });
    Route::prefix('comments')->group(function () {
        Route::get('/', 'comments');
    });
});
