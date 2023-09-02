@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-3">

                <div class="d-flex justify-content-end mb-3">
                    <a class="btn btn-success" href="{{ route('transactions.index') }}">Все транзакции >></a>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('Ваши данные') }}</div>

                    <div class="card-body">
                        <div class="card-text">
                            {{ $current_employee->getName() }}
                            <br>
                            {{ __('Ваш почасовой оклад: ') . $current_employee->rate_per_hour }}
                            <br>
                            {{ __('Принято ваших транзакций: ') . $current_employee->transactions()->count() }}
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Принять транзакцию') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('transactions.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="employee"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Сотрудник') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" name="employee_id">
                                        <option selected>Выберите сотрудника</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->getName() }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="hours"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Количество часов') }}</label>

                                <div class="col-md-6">
                                    <input id="hours" type="number"
                                           class="form-control @error('hours') is-invalid @enderror" name="hours"
                                           required autocomplete="hours">

                                    @error('hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Отправить') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
