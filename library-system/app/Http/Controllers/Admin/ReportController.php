<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }

    public function popularBooks()
    {
        // Получаем ТОП-10 книг по количеству выдач
        // Используем withCount для подсчета связанных записей loans
        $popularBooks = Book::withCount('loans')
            ->orderBy('loans_count', 'desc')
            ->limit(10)
            ->get();

        return view('admin.reports.popular_books', compact('popularBooks'));
    }

    public function debtors()
    {
        // Получаем список пользователей с просроченными, не возвращенными выдачами
        // Текущая дата
        $now = Carbon::now();

        // Находим выдачи, которые:
        // 1. Не возвращены (returned_at IS NULL)
        // 2. Срок возврата (due_at) уже прошел
        $overdueLoans = Loan::whereNull('returned_at')
            ->where('due_at', '<', $now)
            ->with(['user', 'book'])
            ->get();

        // Группируем по пользователям
        $debtors = $overdueLoans->groupBy('user_id')->map(function ($loans) {
            $user = $loans->first()->user;
            $totalFine = $loans->sum('fine_amount');
            return [
                'user' => $user,
                'loans' => $loans,
                'total_fine' => $totalFine,
            ];
        });

        return view('admin.reports.debtors', compact('debtors'));
    }
}