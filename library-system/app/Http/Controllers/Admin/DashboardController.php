<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Можно добавить статистику: количество книг, пользователей, активных выдач и т.д.
        $stats = [
            'total_books' => \App\Models\Book::count(),
            'total_users' => \App\Models\User::count(),
            'active_loans' => \App\Models\Loan::whereNull('returned_at')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
