@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Детали книги</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($book->cover_url)
                                <img src="{{ $book->cover_url }}" alt="Обложка" class="img-fluid">
                            @else
                                <p>Обложка отсутствует</p>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $book->title }}</h3>
                            <p><strong>Автор:</strong> {{ $book->author }}</p>
                            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                            <p><strong>Год:</strong> {{ $book->year }}</p>
                            <p><strong>Жанр:</strong> {{ $book->genre }}</p>
                            <p><strong>Описание:</strong> {{ $book->description ?? 'Нет описания' }}</p>
                            <p><strong>Доступна:</strong> {{ $book->is_available ? 'Да' : 'Нет' }}</p>
                        </div>
                    </div>

                    <hr>
                    @if(Auth::check() && Auth::user()->is_admin)
                        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-warning">Редактировать</a>
                        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Назад</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection