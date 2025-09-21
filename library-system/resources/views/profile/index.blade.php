@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Личный кабинет</div>

                <div class="card-body">
                    <h5>Профиль</h5>
                    <p><strong>ФИО:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Телефон:</strong> {{ $user->phone ?? 'Не указан' }}</p>
                    <p><strong>Адрес:</strong> {{ $user->address ?? 'Не указан' }}</p>

                    <hr>

                    <h5>Мои выдачи</h5>
                    @if($activeLoans->isEmpty())
                        <p>У вас нет активных выдач.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Книга</th>
                                    <th>Дата выдачи</th>
                                    <th>Срок возврата</th>
                                    <th>Штраф</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activeLoans as $loan)
                                    <tr>
                                        <td>{{ $loan->book->title }}</td>
                                        <td>{{ $loan->issued_at }}</td>
                                        <td>{{ $loan->due_at }}</td>
                                        <td>{{ $loan->fine_amount }} руб.</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <h5>История выдач</h5>
                    @if($historyLoans->isEmpty())
                        <p>История выдач пуста.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Книга</th>
                                    <th>Дата выдачи</th>
                                    <th>Дата возврата</th>
                                    <th>Штраф</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($historyLoans as $loan)
                                    <tr>
                                        <td>{{ $loan->book->title }}</td>
                                        <td>{{ $loan->issued_at }}</td>
                                        <td>{{ $loan->returned_at }}</td>
                                        <td>{{ $loan->fine_amount }} руб.</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <hr>

                    <h5>Общая сумма штрафов: {{ $totalFine }} руб.</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection