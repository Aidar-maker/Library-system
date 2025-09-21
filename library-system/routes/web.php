<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');


// Маршруты для аутентификации
require __DIR__.'/auth.php';

// Группа маршрутов, доступных только аутентифицированным пользователям
Route::middleware(['auth'])->group(function () {
    // Личный кабинет читателя
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    // Каталог книг
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

    // Админские маршруты
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Управление книгами (CRUD)
        Route::resource('admin/books', BookController::class)->except(['show', 'index']);
        // Страницы выдачи и возврата книг
        Route::get('/admin/loans/issue', [LoanController::class, 'create'])->name('loans.create');
        Route::post('/admin/loans/issue', [LoanController::class, 'store'])->name('loans.store');
        Route::get('/admin/loans/return', [LoanController::class, 'returnIndex'])->name('loans.return.index');
        Route::post('/admin/loans/return/{loan}', [LoanController::class, 'returnBook'])->name('loans.return');
        // Отчеты
        Route::get('/admin/reports', [ReportController::class, 'index'])->name('reports.index');
    });
    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('books', BookController::class)->names([
            'index' => 'books.index',
            'create' => 'books.create',
            'store' => 'books.store',
            'show' => 'books.show',
            'edit' => 'books.edit',
            'update' => 'books.update',
            'destroy' => 'books.destroy',
        ]);

        //Отчеты
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/popular-books', [ReportController::class, 'popularBooks'])->name('reports.popular_books');
        Route::get('/reports/debtors', [ReportController::class, 'debtors'])->name('reports.debtors');

        // Управление пользователями
        Route::resource('users', UserController::class)->only(['index', 'destroy'])->names([
            'index' => 'users.index',
            'destroy' => 'users.destroy',
        ]);
    });
});
