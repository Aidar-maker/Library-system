<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentUser = $request->user();

        if (!$currentUser) {
            return redirect()->route('login');
        }

        $users = User::where('id', '!=', $currentUser->id)->paginate(10);

        return view('admin.users.index', compact('users'));
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user): RedirectResponse
    {
        // Получаем текущего аутентифицированного пользователя из запроса
        $currentUser = $request->user();

        // Проверка, чтобы админ не мог удалить самого себя
        if ($user->id === $currentUser->id) {
            return redirect()->route('admin.users.index')->with('error', 'Вы не можете удалить самого себя.');
        }

        // TODO: Добавить проверку, можно ли удалять пользователя (например, если у него есть активные выдачи)
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно удален.');
    }
}
