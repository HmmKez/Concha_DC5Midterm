<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;


class BookController extends Controller
{
    public function index()
    {
        return Inertia::render('Books/Index', [
            'books' => Book::all(),
        ]);
    }

    public function store(Request $request)
    {
        return Book::create($request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|unique:books',
            'total_copies' => 'required|integer|min:1',
            'available_copies' => 'required|integer|min:0',
        ]));
    }

    public function show(Book $book)
    {
        return $book;
    }
}

