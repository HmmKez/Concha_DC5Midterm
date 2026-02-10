<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Book;
use App\Models\Borrowing;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;

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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'user' => auth()->user(),
        'books' => Book::latest()->get(),
        'borrowings' => Borrowing::with('book')
            ->where('user_id', auth()->id())
            ->whereNull('returned_at')
            ->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/books/create', function () {
        return Inertia::render('Books/Create');
    })->middleware('auth')->name('books.create');

    
    Route::get('/borrowed-books', [BorrowingController::class, 'myBorrowedBooks'])
        ->middleware(['auth', 'verified'])
        ->name('borrowed-books');

    Route::post('/books', [BookController::class, 'store'])
        ->middleware('auth')
        ->name('books.store');

    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::post('/books/{book}/borrow', [BorrowingController::class, 'borrow'])->name('books.borrow');
    Route::post('/books/{book}/return', [BorrowingController::class, 'return'])->name('books.return');
});

require __DIR__.'/auth.php';
