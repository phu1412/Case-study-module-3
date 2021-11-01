@extends('admin.master')

@section('title')
    Edit Transaction
@endsection

@section('title-content')
    Edit Transaction
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Only admin edit Transactions</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('transactions.update', $transaction->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-primary">From Account</label>
                            <select class="form-control" name='from_id'>
                                @if (isset($transaction->fromAccount->id))
                                    <option value="{{ $transaction->fromAccount->id }}">
                                        {{ $transaction->fromAccount->code }}
                                    </option>
                                @endif
                                <option value=''>Owner</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">To Account</label>
                            <select class="form-control" name='to_id'>
                                @if (isset($transaction->toAccount->id))
                                    <option value="{{ $transaction->toAccount->id }}">
                                        {{ $transaction->toAccount->code }}
                                    </option>
                                @endif
                                <option value=''>Owner</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Amounts</label>
                            <input type="text" class="form-control" name="transaction_amount"
                                value="{{ $transaction->transaction_amount }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('transaction_amount') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Fee</label>
                            <input type="text" class="form-control" name="transaction_fee"
                                value="{{ $transaction->transaction_fee }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('transaction_fee') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Content</label>
                            <input type="text" class="form-control" name="content" value="{{ $transaction->content }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('content') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Addition</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
