<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        //Ищет последние 6 добавленных
        $latestBooks = Book::orderBy("created_at","desc")->limit(6)->get();

        return view("home", compact("latestBooks"));
    }
    public function search(Request $request)
    {
        $query = $request->input('q');

        if ($query) {
            $books = Book::where('title', 'like', "%{$query}%")
                ->orWhere('author', 'like', "%{$query}%")
                ->take(10)
                ->get();
        } else {
            $books = [];
        }

        return view('search.results', compact('books', 'query'));
    }
}
