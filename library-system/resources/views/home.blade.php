@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Добро пожаловать в Библиотечную систему</h2>
                </div>
                <div class="card-body">
                    <p class="text-center">
                        Наша система позволяет легко находить книги, отслеживать выдачи и возвращать их вовремя.
                    </p>

                    <!-- Форма поиска -->
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-8">
                            <form action="{{ route('books.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Поиск книг по названию или автору..." value="{{ request('search') }}">
                                    <button class="btn btn-outline-primary" type="submit">Найти</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Последние добавленные книги -->
                   @if($latestBooks && $latestBooks->count() > 0)
                    <h4>Новые поступления</h4>
                    <div class="row">
                        @foreach($latestBooks as $book)
                            <div class="col-md-4 mb-4 col-sm-3">
                                <a href="{{ route('books.show', $book) }}" >
                                <div class="card h-100 shadow-sm border-0">
                                    <!-- Карточка обложки -->
                                    <div class="position-relative" style="max-height: 450px; max-width: 330px">
                                        <!-- Фоновое изображение -->
                                        @if($book->cover_url)
                                            <img src="{{ $book->cover_url }}" class="w-100 h-100 object-cover" alt="{{ $book->title }}">
                                        @else
                                            <!-- Заглушка -->
                                            <div class="w-100 h-100 bg-secondary d-flex align-items-center justify-content-center">
                                                <span class="text-light">Обложка отсутствует</span>
                                            </div>
                                        @endif

                                        <!-- Текстовые слои (автор, название) -->
                                        <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-75 text-white">
                                            <h6 class="card-title fw-bold">{{ $book->title }}</h6>
                                            <p class="card-text small">{{ $book->author }}</p>
                                        </div>
                                    </div>

                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">Нет новых поступлений.</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection