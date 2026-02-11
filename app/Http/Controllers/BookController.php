<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return inertia('Dashboard', [
            'books' => Book::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|unique:books',
            'total_copies' => 'required|integer|min:1',
            'available_copies' => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect()->route('dashboard')->with('success', 'Book added successfully!');
    }

    public function destroy(Book $book)
    {
        // Optional: if you want, delete related borrowings first
        $book->borrowings()->delete();

        $book->delete();

        return redirect()->back()->with('success', 'Book deleted successfully.');
    }

}
