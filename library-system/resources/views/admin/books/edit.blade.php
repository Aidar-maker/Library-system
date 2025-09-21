@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редактировать книгу</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.books.update', $book) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Название *</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Автор *</label>
                            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $book->author) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN *</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ old('isbn', $book->isbn) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Год *</label>
                            <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $book->year) }}" min="1000" max="{{ date('Y') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="genre" class="form-label">Жанр *</label>
                            <input type="text" name="genre" id="genre" class="form-control" value="{{ old('genre', $book->genre) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $book->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="cover_url" class="form-label">URL обложки</label>
                            <input type="url" name="cover_url" id="cover_url" class="form-control" value="{{ old('cover_url', $book->cover_url) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Обновить</button>
                        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection