@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Управление книгами</span>
                    <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Добавить книгу</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Автор</th>
                                <th>ISBN</th>
                                <th>Год</th>
                                <th>Жанр</th>
                                <th>Доступна</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>{{ $book->year }}</td>
                                    <td>{{ $book->genre }}</td>
                                    <td>{{ $book->is_available ? 'Да' : 'Нет' }}</td>
                                    <td>
                                        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-sm btn-warning">Редактировать</a>
                                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Книги не найдены</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $books->links() }} <!-- Пагинация -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection