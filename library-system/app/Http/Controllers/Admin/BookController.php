<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10); // Пагинация по 10 книг на страницу
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn|max:17', // ISBN-13 или ISBN-10
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'genre' => 'required|string|max:100',
            'description' => 'nullable|string',
            'cover_url' => 'nullable|url',
        ]);

        Book::create($validatedData);

        return redirect()->route('admin.books.index')->with('success', 'Книга успешно добавлена.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id . '|max:17',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'genre' => 'required|string|max:100',
            'description' => 'nullable|string',
            'cover_url' => 'nullable|url',
        ]);

        $book->update($validatedData);

        return redirect()->route('admin.books.index')->with('success', 'Книга успешно обновлена.');
    }

    public function destroy(Book $book)
    {
        // TODO: Добавить проверку, можно ли удалять книгу (например, если она выдана)
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Книга успешно удалена.');
    }
}
