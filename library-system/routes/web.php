<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Admin;

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Маршруты для аутентификации
require __DIR__.'/auth.php';

// Маршруты для авторизованных
Route::middleware(['auth'])->group(function () {
    // Личный кабинет читателя
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/search', [HomeController::class, 'search'])->name('home.search');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    //Редактирование профиля
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Каталог книг (доступен всем пользователям)
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

    // Маршруты только для админа
    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Управление книгами (CRUD)
        // Используем resource, но исключаем index и show, чтобы не переопределять глобальные
        Route::resource('books', Admin\BookController::class)->except(['index', 'show'])->names([
            'create' => 'books.create',
            'store' => 'books.store',
            'edit' => 'books.edit',
            'update' => 'books.update',
            'destroy' => 'books.destroy',
        ]);

        // Если админу нужен *свой* список книг (все книги, включая занятые), можно добавить отдельный маршрут:
        Route::get('/books', [Admin\BookController::class, 'index'])->name('books.index'); // Новое имя!

        // Управление пользователями
        Route::resource('users', UserController::class)->only(['index', 'destroy'])->names([
            'index' => 'users.index',
            'destroy' => 'users.destroy',
        ]);

        // Выдача и возврат книг
        Route::get('/loans/issue', [LoanController::class, 'create'])->name('loans.create');
        Route::post('/loans/issue', [LoanController::class, 'store'])->name('loans.store');
        Route::get('/loans/return', [LoanController::class, 'returnIndex'])->name('loans.return.index');
        Route::post('/loans/return/{loan}', [LoanController::class, 'returnBook'])->name('loans.return');

        // Отчеты
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/popular-books', [ReportController::class, 'popularBooks'])->name('reports.popular_books');
        Route::get('/reports/debtors', [ReportController::class, 'debtors'])->name('reports.debtors');

        // Настройки системы
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});