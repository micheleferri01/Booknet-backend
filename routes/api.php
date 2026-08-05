<?php

use App\Http\Controllers\api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\api\EditorController;
use App\Http\Controllers\api\GenreController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{book}', [BookController::class, 'show']);

Route::get('/authors', [AuthorController::class, 'index']);

Route::get('/editors', [EditorController::class, 'index']);

Route::get('/genres', [GenreController::class, 'index']);

Route::post('/cart', [CartController::class, 'index']);

Route::fallback(function () {
    return response()->json(['message' => 'Endpoint API non esistente.'], 404);
});
