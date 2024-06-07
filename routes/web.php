<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/author', [AuthorController::class,'index'])->name('author.all');
Route::get('/author/create', [AuthorController::class,'create'])->name('author.create');
Route::post('/author', [AuthorController::class, 'store'])->name('author.store');
Route::get('/author/{author}', [AuthorController::class , 'show'])->name('author.show');
Route::get('/author/{author}/edit', [AuthorController::class , 'edit'])->name('author.edit');
Route::put('/author/{author}', [AuthorController::class , 'update'])->name('author.update');
Route::delete('/author/{author}', [AuthorController::class , 'destroy'])->name('author.destroy');

Route::get('/book', [BookController::class, 'index'])->name('book.all');
Route::get('/book/create', [BookController::class,'create'])->name('book.create');
Route::post('/book', [BookController::class, 'store'])->name('book.store');
Route::get('/book/{book}', [BookController::class , 'show'])->name('book.show');
Route::get('/book/{book}/edit', [BookController::class , 'edit'])->name('book.edit');
Route::put('/book/{book}', [BookController::class , 'update'])->name('book.update');
Route::delete('/book/{book}', [BookController::class , 'destroy'])->name('book.destroy');

Route::get('/', [AuthorController::class,'list'])->name('author.list');

require __DIR__.'/auth.php';
