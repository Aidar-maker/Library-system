<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Loan;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        // Не возвращенные выдочи
        $activeLoans = Loan::where('user_id', $user->id)
            ->whereNull('returned_at')
            ->with('book') // Загружаем связанные книги
            ->get();

        // Возвращенные выдачи
        $historyLoans = Loan::where('user_id', $user->id)
            ->whereNotNull('returned_at')
            ->with('book')
            ->get();

        // Общая сумма штрафов
        $totalFine = $activeLoans->sum('fine_amount');

        return view('profile.index', compact('user', 'activeLoans', 'historyLoans', 'totalFine'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $request->user()->id,
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        ]);

        $request->user()->update($request->only('name', 'email', 'phone','address'));

        return redirect()->back()->with('success', 'Профиль обновлён.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
