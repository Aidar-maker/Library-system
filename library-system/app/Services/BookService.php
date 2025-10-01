<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Http\Request;

class BookService
{
    /**
     * Получить список книг с фильтрацией.
     *
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getFilteredBooks(Request $request)
    {
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

        // Возвращаем пагинированный результат
        return $query->paginate(12)->appends($request->query());
    }
}