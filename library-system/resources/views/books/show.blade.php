@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Детали книги</span>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Назад к каталогу</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3 mb-md-0">
                            @if($book->cover_url)
                                <img src="{{ $book->cover_url }}" alt="{{ $book->title }}" class="img-fluid rounded">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                                    <span class="text-muted">Обложка отсутствует</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h2>{{ $book->title }}</h2>
                            <p class="lead">Автор: {{ $book->author }}</p>
                            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                            <p><strong>Год издания:</strong> {{ $book->year }}</p>
                            <p><strong>Жанр:</strong> {{ $book->genre }}</p>
                            <p><strong>Статус:</strong>
                                @if($book->is_available)
                                    <span class="badge bg-success">Доступна</span>
                                @else
                                    <span class="badge bg-warning">Занята</span>
                                @endif
                            </p>
                            @if($book->description)
                                <p><strong>Описание:</strong></p>
                                <p>{{ $book->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection