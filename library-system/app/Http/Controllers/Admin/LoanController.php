<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Loan;
use Carbon\Carbon;

class LoanController extends Controller
{
    // Форма выдачи книги
    public function create()
    {
        // Получаем всех пользователей кроме админов и доступные книги
        $users = User::where('is_admin', false)->get();
        $books = Book::where('is_available', true)->get();

        return view('admin.loans.create', compact('users', 'books'));
    }

    // Обработка выдачи
    public function store(Request $request, Loan $loan)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'issued_at' => 'required|date',
        ]);

        $book = Book::findOrFail($validatedData['book_id']);

        // доступна ли книга для выдачи
        if (!$book->is_available) {
            return redirect()->back()->withErrors(['book_id' => 'Книга уже выдана.'])->withInput();
        }

        // Ставим дату возврата, по умолчанию 14 дней
        $issuedAt = Carbon::parse($validatedData['issued_at']);
        $dueAt = $issuedAt->copy()->addDays(14);

        // создание записи выдачи
        $loan = Loan::create([
            'user_id' => $validatedData['user_id'],
            'book_id' => $validatedData['book_id'],
            'issued_at' => $issuedAt,
            'due_at' => $dueAt,
        ]);

        // обновление статуса "занят"
        $book->update(['is_available' => false]);

        return redirect()->route('admin.dashboard')->with('success', 'Книга успешно выдана.');
    }

    // Страница выбора выдачи для возврата
    public function returnIndex()
    {
        // Получаем все активные выдачи (не возвращены)
        $activeLoans = Loan::whereNull('returned_at')
            ->with(['user', 'book'])
            ->get();

        return view('admin.loans.return_index', compact('activeLoans'));
    }

    // обработка возврата
    public function returnBook(Request $request, Loan $loan)
    {
        // Проверка, что книга еще не возвращена
        if ($loan->returned_at) {
            return redirect()->back()->with('error', 'Книга уже возвращена.');
        }

        // Фиксируем дату возврата
        $returnedAt = Carbon::now();
        $loan->returned_at = $returnedAt;

        // расчет штрафа если есть просрочка
        $fineAmount = 0;
        if ($loan->due_at->isPast()) {
            $daysOverdue = $loan->due_at->diffInDays($returnedAt);
            $fineRate = 10;
            $fineAmount = $daysOverdue * $fineRate;
        }
        $loan->fine_amount = $fineAmount;

        // Сохраняем изменения в выдаче
        $loan->save();

        // Обновляем статус книги на "доступна"
        $loan->book->update(['is_available' => true]);

        return redirect()->route('admin.dashboard')->with('success', "Книга возвращена. Штраф: {$fineAmount} руб.");
    }
}