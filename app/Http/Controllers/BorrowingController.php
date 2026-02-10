<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;


class BorrowingController extends Controller
{
    public function borrow(Book $book)
    {
        if ($book->available_copies < 1) {
            return response()->json(['message' => 'Book not available'], 400);
        }

        $borrowing = Borrowing::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'due_date' => Carbon::now()->addDays(7),
        ]);

        $book->decrement('available_copies');

        return $borrowing;
    }

    public function myBorrowedBooks()
    {
        $borrowedBooks = auth()->user()->borrowings()->with('book')->get();

        return Inertia::render('BorrowedBooks', [
            'borrowedBooks' => $borrowedBooks
        ]);
    }

    public function return(Book $book)
    {
        $borrowing = Borrowing::where('book_id', $book->id)
            ->where('user_id', auth()->id())
            ->whereNull('returned_at')
            ->firstOrFail();

        $borrowing->update([
            'returned_at' => now(),
        ]);

        $book->increment('available_copies');

        return response()->json(['message' => 'Book returned successfully']);
    }
}

