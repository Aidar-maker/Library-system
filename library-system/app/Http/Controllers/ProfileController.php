<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Book;

class ProfileController extends Controller
{
    /**
     * Отображает личный кабинет пользователя.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        // Активные выдачи (не возвращены)
        $activeLoans = Loan::where('user_id', $user->id)
            ->whereNull('returned_at')
            ->with('book')
            ->get();

        // История выдач (уже возвращены)
        $historyLoans = Loan::where('user_id', $user->id)
            ->whereNotNull('returned_at')
            ->with('book')
            ->get();

        // Расчет суммы штрафов
        $totalFine = $activeLoans->sum(function ($loan) {
            return $loan->fine_amount;
        });

        return view('profile.index', compact('user', 'activeLoans', 'historyLoans', 'totalFine'));
    }
    public function edit(Request $request)
    {
        return view('profile.edit');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
        ]);

        $request->user()->update($request->only('name', 'email'));

        return redirect()->back()->with('success', 'Профиль обновлён.');
    }
}