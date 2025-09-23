@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Выдача книги</span>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.loans.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Читатель *</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="">Выберите читателя</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="book_id" class="form-label">Книга *</label>
                            <select name="book_id" id="book_id" class="form-control" required>
                                <option value="">Выберите книгу</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                        {{ $book->title }} - {{ $book->author }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="issued_at" class="form-label">Дата выдачи *</label>
                            <input type="date" name="issued_at" id="issued_at" class="form-control" value="{{ old('issued_at', now()->format('Y-m-d')) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Выдать книгу</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection