@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Результаты поиска: "{{ $query }}"</div>

                <div class="card-body">
                    @if($books->isEmpty())
                        <p>Книги не найдены.</p>
                    @else
                        <ul class="list-group">
                            @foreach($books as $book)
                                <li class="list-group-item">
                                    <strong>{{ $book->title }}</strong> — {{ $book->author }}
                                    <br>
                                    <small>{{ $book->year }} г., {{ $book->genre }}</small>
                                    <br>
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary">Подробнее</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection