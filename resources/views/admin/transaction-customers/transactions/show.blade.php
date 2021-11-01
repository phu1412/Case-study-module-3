@extends('admin.master')

@section('title')
    Show Transaction
@endsection

@section('title-content')
    {{ $account_main->customer->customer_name . ' - ' . $account_main->code }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div style="margin-bottom: 15px;" >
                <a href=" {{ route('transactionOnes.export', $account_main->id) }}" class="btn btn-success">Export
                    Excel</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>From Account</th>
                        <th>To Account</th>
                        <th>Amounts</th>
                        <th>Fee</th>
                        <th>Account Balance</th>
                        <th>Code</th>
                        <th>Content</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $key => $transaction)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                @if (isset($transaction->fromAccount->id))
                                    @if ($account_main->code == $transaction->fromAccount->code)
                                        Owner
                                    @else
                                        <a href="{{ route('customers.show', $transaction->fromAccount->customer->id) }}">
                                            {{ $transaction->fromAccount->code }}</a>
                                    @endif
                                @elseif ($transaction->from_id == '' )

                                @endif
                            </td>
                            <td>
                                @if (isset($transaction->toAccount->id))
                                    @if ($account_main->code == $transaction->toAccount->code)
                                        Owner
                                    @else
                                        <a href="{{ route('customers.show', $transaction->toAccount->customer->id) }}">
                                            {{ $transaction->toAccount->code }}</a>
                                    @endif
                                @elseif ($transaction->to_id == '' )

                                @endif
                            </td>
                            <td>
                                @if (isset($transaction->fromAccount->code) && $account_main->code == $transaction->fromAccount->code)
                                    <span style="color:red">-
                                        {{ number_format($transaction->transaction_amount) . ' VND' }}</span>
                                @else
                                    <span style="color:green">+
                                        {{ number_format($transaction->transaction_amount) . ' VND' }}</span>
                                @endif
                            </td>
                            <td>
                                @if (isset($transaction->fromAccount->code) && $account_main->code == $transaction->fromAccount->code)
                                    <span
                                        style="color:red">-{{ number_format($transaction->transaction_fee) . ' VND' }}</span>
                                @else
                                @endif

                            </td>
                            <td>
                                @if (isset($transaction->fromAccount->code) && $account_main->code == $transaction->fromAccount->code)
                                    {{ number_format($transaction->amounts_of_from) . ' VND' }}
                                @endif

                                @if (isset($transaction->toAccount->code) && $account_main->code == $transaction->toAccount->code)
                                    {{ number_format($transaction->amounts_of_to) . ' VND' }}
                                @endif
                            </td>
                            <td>{{ $transaction->code }}</td>
                            <td>{{ $transaction->content }}</td>
                            <td> {{ $transaction->created_at->format('H:i  d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
