<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\CategoryController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Post Article
Route::get('/post', [PostController::class, 'index']);
Route::post('/post', [PostController::class, 'store']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::put('/post/{id}', [PostController::class, 'update']);
Route::delete('/post/{id}', [PostController::class, 'destroy']);

// Batas Hak Akses Post Article
// Route::get('/post', [PostController::class, 'index'])->middleware('auth:api');
// Route::post('/post', [PostController::class, 'store'])->middleware('auth:api');
// Route::get('/post/{id}', [PostController::class, 'show'])->middleware('auth:api');
// Route::put('/post/{id}', [PostController::class, 'update'])->middleware('auth:api');
// Route::delete('/post/{id}', [PostController::class, 'destroy'])->middleware('auth:api');

// Laravel Passport
Route::post('login', [UserController::class, 'userlogin']);
// Cek User Login
Route::get('/me', [UserController::class, 'me'])->middleware('auth:api');

// Categories
Route::resource('/categories', CategoryController::class);

// Batas Hak Akses Categories
// Route::resource('/categories', CategoryController::class)->middleware('auth:api');

// Prefix
Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/post', PostController::class);
});