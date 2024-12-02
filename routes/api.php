<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/greeting', function (Request $request) {
    return response()->json([
        'message' => 'Hello World!'
    ]);
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('me', [AuthController::class, 'getMe']);



Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('products', ProductController::class);
});