@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить книгу</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.books.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Название *</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Автор *</label>
                            <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN *</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ old('isbn') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Год *</label>
                            <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}" min="1000" max="{{ date('Y') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="genre" class="form-label">Жанр *</label>
                            <input type="text" name="genre" id="genre" class="form-control" value="{{ old('genre') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="cover_url" class="form-label">URL обложки</label>
                            <input type="url" name="cover_url" id="cover_url" class="form-control" value="{{ old('cover_url') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить</button>
                        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection