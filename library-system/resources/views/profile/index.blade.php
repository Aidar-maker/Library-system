@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Личный кабинет</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h4>Мой профиль</h4>
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>ФИО:</strong> {{ $user->name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <!-- Если в будущем добавятся телефон и адрес, их можно будет сюда добавить -->
                    </ul>

                    <h4>Мои штрафы</h4>
                    <p>Общая сумма штрафов: <strong>{{ number_format($totalFine, 2, ',', ' ') }} руб.</strong></p>

                    <hr>

                    <h4>Активные выдачи</h4>
                    @if($activeLoans->isEmpty())
                        <p>У вас нет активных выдач.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Книга</th>
                                        <th>Дата выдачи</th>
                                        <th>Срок возврата</th>
                                        <th>Дней до возврата</th>
                                        <th>Штраф</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activeLoans as $loan)
                                        <tr>
                                            <td>{{ $loan->book->title }}</td>
                                            <td>{{ $loan->issued_at->format('d.m.Y') }}</td>
                                            <td>{{ $loan->due_at->format('d.m.Y') }}</td>
                                            <td>
                                                @if($loan->due_at->isPast())
                                                    <span class="text-danger">{{ $loan->due_at->diffInDays(now()) }} дней просрочки</span>
                                                @else
                                                    {{ $loan->due_at->diffInDays(now()) }} дней
                                                @endif
                                            </td>
                                            <td>{{ number_format($loan->fine_amount, 2, ',', ' ') }} руб.</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <hr>

                    <h4>История выдач</h4>
                    @if($historyLoans->isEmpty())
                        <p>У вас нет истории выдач.</p>
                    @else
                        <div class="table-responsive">
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
                                            <td>{{ $loan->issued_at->format('d.m.Y') }}</td>
                                            <td>{{ $loan->returned_at->format('d.m.Y') }}</td>
                                            <td>{{ number_format($loan->fine_amount, 2, ',', ' ') }} руб.</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection