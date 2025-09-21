@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Админ-панель</div>

                <div class="card-body">
                    <h4>Статистика</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            Всего книг: <strong>{{ $stats['total_books'] }}</strong>
                        </li>
                        <li class="list-group-item">
                            Всего пользователей: <strong>{{ $stats['total_users'] }}</strong>
                        </li>
                        <li class="list-group-item">
                            Активных выдач: <strong>{{ $stats['active_loans'] }}</strong>
                        </li>
                    </ul>

                    <hr>

                    <h4>Управление</h4>
                    <ul>
                        <li><a href="{{ route('admin.books.index') }}">Управление книгами</a></li>
                        <li><a href="{{ route('admin.users.index') }}">Управление пользователями</a></li>
                        <li><a href="{{ route('admin.reports.index') }}">Отчеты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection