<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\Admin\BookController;

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
        //Route::resource('books', BookController::class)->except(['show', 'index']);
        Route::get('admin/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('admin/books/{book}', [BookController::class, 'update'])->name('books.update');

        // Отчеты
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/popular-books', [ReportController::class, 'popularBooks'])->name('reports.popular_books');
        Route::get('/reports/debtors', [ReportController::class, 'debtors'])->name('reports.debtors');
        
        Route::resource('books', BookController::class)->names([
            'index' => 'books.index',
            'create' => 'books.create',
            'store' => 'books.store',
            'show' => 'books.show',
            'edit' => 'books.edit',
            'update' => 'books.update',
            'destroy' => 'books.destroy',
        ]);

        // Управление пользователями
        Route::resource('users', UserController::class)->only(['index', 'destroy'])->names([
            'index' => 'users.index',
            'destroy' => 'users.destroy',
        ]);

        //Выдача книг
        Route::get('admin/loans/issue', [LoanController::class, 'create'])->name('loans.create');
        Route::post('admin/loans/issue', [LoanController::class, 'store'])->name('loans.store');
        
        //Возврат книг
        Route::get('/loans/return', [LoanController::class, 'returnIndex'])->name('loans.return.index');
        Route::post('/loans/return/{loan}', [LoanController::class, 'returnBook'])->name('loans.return');
    
        //Настройки системы
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});