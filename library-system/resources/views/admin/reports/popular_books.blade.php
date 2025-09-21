@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>ТОП-10 популярных книг</span>
                    <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary btn-sm">Назад</a>
                </div>

                <div class="card-body">
                    @if($popularBooks->isEmpty())
                        <p>Нет данных для отчета.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Автор</th>
                                    <th>Количество выдач</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularBooks as $index => $book)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->loans_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection