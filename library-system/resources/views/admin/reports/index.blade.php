@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Отчеты</div>

                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('admin.reports.popular_books') }}">ТОП-10 популярных книг</a></li>
                        <li><a href="{{ route('admin.reports.debtors') }}">Список должников</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection