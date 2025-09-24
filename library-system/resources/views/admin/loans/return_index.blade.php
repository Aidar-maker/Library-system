@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Возврат книги</span>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm">Назад</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($activeLoans->isEmpty())
                        <p>Нет активных выдач.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Читатель</th>
                                        <th>Книга</th>
                                        <th>Дата выдачи</th>
                                        <th>Срок возврата</th>
                                        <th>Дней до возврата</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activeLoans as $loan)
                                        <tr>
                                            <td>{{ $loan->user->name ?? 'Неизвестный' }}</td>
                                            <td>{{ $loan->book->title ?? 'Неизвестная' }}</td>
                                            <td>{{ $loan->issued_at->format('d.m.Y') ?? 'Неизвестно' }}</td>
                                            <td>{{ $loan->due_at->format('d.m.Y') ?? 'Неизвестно' }}</td>
                                            <td>
                                                @if($loan->due_at && $loan->due_at->isPast())
                                                    <span class="text-danger">{{ $loan->due_at->diffInDays(now()) }} дней просрочки</span>
                                                @elseif($loan->due_at)
                                                    {{ $loan->due_at->diffInDays(now()) }} дней
                                                @else
                                                    Неизвестно
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.loans.return', $loan) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Подтвердить возврат книги?')">Принять возврат</button>
                                                </form>
                                            </td>
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