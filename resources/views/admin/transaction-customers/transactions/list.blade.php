@extends('admin.master')

@section('title')
    Transaction
@endsection

@section('title-content')
    Transaction Table
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add Transaction</a>
            <a href="{{ route('transactions.export') }}" class="btn btn-success">Export Excel</a>
            <form method="post" action="{{ route('transactions.search') }}" class="float-right">
                @csrf
                <div class="input-group
                input-group-sm" style="width: 180px; padding-top: 4px">

                    <input type=" text" name="keyword" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>From Account</th>
                        <th>To Account</th>
                        <th>Amounts</th>
                        <th>Fee</th>
                        <th>Code</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $key => $transaction)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                @if (isset($transaction->fromAccount->id))
                                    <a href="{{ route('transactions.show', $transaction->fromAccount->id) }}">
                                        {{ $transaction->fromAccount->code }}</a>
                                @endif
                            </td>
                            <td>
                                @if (isset($transaction->toAccount->id))
                                    <a href="{{ route('transactions.show', $transaction->toAccount->id) }}">
                                        {{ $transaction->toAccount->code }}</a>
                                @endif
                            </td>
                            <td>{{ number_format($transaction->transaction_amount) . ' VND' }}</td>
                            <td>{{ number_format($transaction->transaction_fee) . ' VND' }}</td>
                            <td>{{ $transaction->code }}</td>
                            <td>{{ $transaction->content }}</td>
                            <td>{{ $transaction->created_at->format('H:i  d-m-Y') }}</td>
                            <td><a href="{{ route('transactions.edit', $transaction->id) }}"><i
                                class="fas fa-edit fa-lg text-info"></i></a>
                                @cannot('teller')
                                    <a href="{{ route('transactions.destroy', $transaction->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this?')"><i
                                        class="fas fa-trash-alt text-danger fa-lg"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
