@php
use Carbon\Carbon;
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Список должников</span>
                    <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary btn-sm">Назад</a>
                </div>

                <div class="card-body">
                    @if($debtors->isEmpty())
                        <p>Нет должников.</p>
                    @else
                        @foreach($debtors as $debtor)
                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ $debtor['user']->name }} ({{ $debtor['user']->email }})
                                    <span class="badge bg-danger float-end">Общий штраф: {{ number_format($debtor['total_fine'], 2, ',', ' ') }} руб.</span>
                                </div>
                                <div class="card-body">
                                    <h6>Просроченные выдачи:</h6>
                                    <ul>
                                        @foreach($debtor['loans'] as $loan)
                                            <li>
                                                <strong>{{ $loan->book->title }}</strong> -
                                                Выдана: {{ $loan->issued_at }} -
                                                Срок возврата: {{ $loan->due_at }} -
                                                Просрочка: {{ $loan->due_at->diffInDays(Carbon::now()) }} дней -
                                                Штраф: {{ number_format($loan->fine_amount, 2, ',', ' ') }} руб.
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection