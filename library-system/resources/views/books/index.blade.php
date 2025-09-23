@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Каталог книг</span>
                    <form action="{{ route('books.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Поиск по названию или автору..." value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary btn-sm" type="submit">Найти</button>
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