@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-start mb-3">
            <a class="btn btn-success" href="{{ route('home') }}"><< Принять транзакцию</a>
        </div>

        <div class="row justify-content-center">
            @if($transactions->isEmpty() !== true)
                <span class="">
                <form action="{{ route('transactions.update', 0) }}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-danger">Выплатить всем</button>
                </form>
            </span>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">Невыплачено, руб/час</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <form action="{{ route('transactions.update', $transaction->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <tr>
                                <th scope="row">{{ $transaction->id }}</th>
                                <td>{{ $transaction->employee->lname }}</td>
                                <td>{{ $transaction->employee->fname }}</td>
                                <td>{{ $transaction->getTotalSum($transaction->employee->id, $transaction->hours) . ' / ' . $transaction->hours }}</td>
                                <td>
                                    <button type="submit" class="btn btn-danger">
                                        Выплатить
                                    </button>
                                </td>
                            </tr>
                        </form>
                    @endforeach

                    <div>
                        {{ $transactions->links() }}
                    </div>

                    </tbody>
                </table>
            @else
                <div class="alert alert-primary" role="alert">
                    {{ __('Все выплаты произведены') }}
                </div>
            @endif
        </div>
    </div>
@endsection
