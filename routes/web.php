<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/authors', AuthorController::class)->middleware(['auth', 'verified']);
Route::resource('/editors', EditorController::class)->middleware(['auth', 'verified']);
Route::resource('/genres', GenreController::class)->middleware(['auth', 'verified']);
Route::resource('/books', BookController::class)->middleware(['auth', 'verified']);
Route::get('/orders', [OrderController::class, 'index'])->middleware(['auth', 'verified']);
Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('order.status')->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
