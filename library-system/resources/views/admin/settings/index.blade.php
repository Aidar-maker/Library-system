@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Настройки системы</span>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="loan_period_days" class="form-label">Срок выдачи (дней) *</label>
                            <input type="number" name="loan_period_days" id="loan_period_days" class="form-control" 
                                   value="{{ old('loan_period_days', $settings['loan_period_days']->value ?? 14) }}" 
                                   min="1" max="365" required>
                            @if ($errors->has('loan_period_days'))
                                <div class="text-danger">{{ $errors->first('loan_period_days') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="fine_rate_per_day" class="form-label">Ставка штрафа (руб./день) *</label>
                            <input type="number" name="fine_rate_per_day" id="fine_rate_per_day" class="form-control" step="0.01"
                                   value="{{ old('fine_rate_per_day', $settings['fine_rate_per_day']->value ?? 10) }}" 
                                   min="0" required>
                            @if ($errors->has('fine_rate_per_day'))
                                <div class="text-danger">{{ $errors->first('fine_rate_per_day') }}</div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить настройки</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection