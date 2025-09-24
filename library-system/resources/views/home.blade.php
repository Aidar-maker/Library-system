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
                    @if(isset($latestBooks) && $latestBooks->count() > 0)
                        <h4>Новые поступления</h4>
                        <div class="row">
                            @foreach($latestBooks as $book)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        @if($book->cover_url)
                                            <img src="{{ $book->cover_url }}" class="card-img-top" alt="{{ $book->title }}" style="height: 200px; object-fit: cover;">
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                                <span class="text-muted">Обложка отсутствует</span>
                                            </div>
                                        @endif
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title">{{ $book->title }}</h6>
                                            <p class="card-text"><small class="text-muted">{{ $book->author }}</small></p>
                                            <a href="{{ route('books.show', $book) }}" class="btn btn-primary mt-auto btn-sm">Подробнее</a>
                                        </div>
                                    </div>
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