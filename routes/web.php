<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Book;
use App\Models\Borrowing;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/announcements', function () {
    return Inertia::render('Announcement');
})->middleware(['auth', 'verified'])->name('announcements');

Route::get('about', function () {
    return Inertia::render('AboutPage');
})->name('about-page');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'user' => auth()->user(),
            'books' => Book::latest()->get(),
        ]);
    })->middleware(['auth', 'verified'])->name('dashboard');

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Book management
    Route::get('/books/create', function () {
        return Inertia::render('Books/Create');
    })->name('books.create');

    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/books', [BookController::class, 'index'])->name('books.index');

    // Borrowing books
    Route::post('/books/{book}/borrow', [BorrowingController::class, 'borrow'])->name('books.borrow');
    Route::post('/books/{book}/return', [BorrowingController::class, 'return'])->name('books.return');
    Route::get('/borrowed-books', [BorrowingController::class, 'myBorrowedBooks'])->name('borrowed-books');
});

require __DIR__.'/auth.php';
