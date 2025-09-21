@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Библиотечная система</div>

                <div class="card-body">
                    <p>Добро пожаловать в систему управления библиотекой!</p>
                    <p>Здесь вы можете найти книги, оформить выдачу и отслеживать свои штрафы.</p>

                    <!-- Форма поиска -->
                    <form action="{{ route('home.search') }}" method="GET" class="mt-4">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Поиск по названию или автору..." required>
                            <button class="btn btn-primary" type="submit">Найти</button>
                        </div>
                    </form>

                    <!-- Кнопки навигации -->
                    @guest
                        <div class="mt-4">
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary">Войти</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">Зарегистрироваться</a>
                        </div>
                    @else
                        <div class="mt-4">
                            <a href="{{ route('books.index') }}" class="btn btn-outline-info">Каталог книг</a>
                            <a href="{{ route('profile.index') }}" class="btn btn-outline-success">Личный кабинет</a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection