<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Services\BookService;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Получаем все книги (для админа)
        $query = Book::query();

        // Фильтр по поиску (название или автор)
        if ($request->has('search') && $search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%");
            });
        }

        // Фильтр по жанру
        if ($request->has('genre') && $genre = $request->input('genre')) {
            $query->where('genre', $genre);
        }

        // Фильтр по статусу (доступна/занята)
        if ($request->has('status') && $status = $request->input('status')) {
            if ($status === 'available') {
                $query->where('is_available', true);
            } elseif ($status === 'not_available') {
                $query->where('is_available', false);
            }
        }

        // Фильтр по году (от и до)
        if ($request->has('year_from') && $yearFrom = $request->input('year_from')) {
            $query->where('year', '>=', (int)$yearFrom);
        }
        if ($request->has('year_to') && $yearTo = $request->input('year_to')) {
            $query->where('year', '<=', (int)$yearTo);
        }

        $books = $query->paginate(10)->appends($request->query());

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
