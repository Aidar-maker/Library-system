<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->has('search') && $search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%");
            });
        }

        //фильтр по жанру
        if ($request->has("genre") && $genre = $request->input("genre")) {
            $query->where('genre', $genre);
        }

        // Фильтр по году (от и до)
        if ($request->has('year_from') && $yearFrom = $request->input('year_from')) {
            $query->where('year', '>=', (int)$yearFrom);
        }
        if ($request->has('year_to') && $yearTo = $request->input('year_to')) {
            $query->where('year', '<=', (int)$yearTo);
        }

        // Выполняем запрос с пагинацией
        $books = $query->paginate(10)->appends($request->query());

        // Получаем уникальные жанры для выпадающего списка фильтра
        $genres = Book::select('genre')->distinct()->orderBy('genre')->pluck('genre');

        return view('books.index', compact('books', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
