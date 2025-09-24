@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Каталог книг</span>
                    <!-- Форма фильтрации -->
                    <form action="{{ route('books.index') }}" method="GET" class="d-flex flex-wrap gap-2">
                        <!-- Поиск -->
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Поиск..." value="{{ request('search') }}">
                        </div>

                        <!-- Фильтр по жанру -->
                        <select name="genre" class="form-select form-select-sm">
                            <option value="">Все жанры</option>
                            @foreach($genres as $genreOption)
                                <option value="{{ $genreOption }}" {{ request('genre') == $genreOption ? 'selected' : '' }}>
                                    {{ $genreOption }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Фильтр по статусу -->
                        <select name="status" class="form-select form-select-sm">
                            <option value="">Все статусы</option>
                            <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Доступна</option>
                            <option value="not_available" {{ request('status') == 'not_available' ? 'selected' : '' }}>Занята</option>
                        </select>

                        <!-- Фильтр по году "от" -->
                        <input type="number" name="year_from" class="form-control form-control-sm" placeholder="Год от" min="1000" max="{{ date('Y') }}" value="{{ request('year_from') }}" style="width: 100px;">

                        <!-- Фильтр по году "до" -->
                        <input type="number" name="year_to" class="form-control form-control-sm" placeholder="Год до" min="1000" max="{{ date('Y') }}" value="{{ request('year_to') }}" style="width: 100px;">

                        <button class="btn btn-outline-secondary btn-sm" type="submit">Применить</button>
                        <!-- Кнопка сброса фильтров -->
                        <a href="{{ route('books.index') }}" class="btn btn-outline-warning btn-sm">Сбросить</a>
                    </form>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($books->isEmpty())
                        <p class="text-center">Книги не найдены.</p>
                    @else
                        <div class="row">
                            @foreach($books as $book)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card h-100">
                                        @if($book->cover_url)
                                            <img src="{{ $book->cover_url }}" class="card-img-top" alt="{{ $book->title }}" style="height: 200px; object-fit: cover;">
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                                <span class="text-muted">Обложка отсутствует</span>
                                            </div>
                                        @endif
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $book->title }}</h5>
                                            <p class="card-text"><small class="text-muted">Автор: {{ $book->author }}</small></p>
                                            <p class="card-text flex-grow-1">{{ Str::limit($book->description, 100) }}</p>
                                            <a href="{{ route('books.show', $book) }}" class="btn btn-primary mt-auto">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Пагинация -->
                        <div class="d-flex justify-content-center">
                            {{ $books->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection