<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");
    }
    public function search(Request $request)
    {
        $query = $request->input('q');

        if ($query) {
            $books = \App\Models\Book::where('title', 'like', "%{$query}%")
                ->orWhere('author', 'like', "%{$query}%")
                ->take(10)
                ->get();
        } else {
            $books = [];
        }

        return view('search.results', compact('books', 'query'));
    }
}
