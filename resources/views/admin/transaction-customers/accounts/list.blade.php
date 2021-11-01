@extends('admin.master')

@section('title')
    Account Bank
@endsection

@section('title-content')
    Account Bank Table
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('accounts.create') }}" class="btn btn-primary">Add Account Bank</a>
            <a href="{{ route('accounts.export') }}" class="btn btn-success">Export Excel</a>
            <form method="post" action="{{ route('accounts.search') }}" class="float-right">
                @csrf
                <div class=" input-group
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
                        <th>Customer Name</th>
                        <th>Card Code</th>
                        <th>Account Number</th>
                        <th>Amounts</th>
                        <th>Created At</th>
                        <th>Info Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $key => $account)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                @if (isset($account->customer_id))
                                    <a href="{{ route('customers.show', $account->customer->id) }}">
                                        {{ $account->customer->customer_name }}</a>
                                @else
                                    Not Customer
                                @endif
                            </td>
                            <td>
                                @if (isset($account->card_id))
                                    <a
                                        href="{{ route('cards.show', $account->card->id) }}">{{ $account->card->code }}</a>
                                @else
                                    Not Card
                                @endif
                            </td>
                            <td>
                                @if (isset($account->customer))
                                    <a href="{{ route('transactions.show', $account->id) }}">{{ $account->code }}</a>
                                @else
                                    {{ $account->code }}
                                @endif
                            </td>
                            <td>
                                @if (!isset($account->customer))
                                    {{ number_format($account->amounts) . ' VND' }}

                                @else
                                    <a href="{{ route('transactions.show', $account->id) }}">
                                        {{ number_format($account->amounts) . ' VND' }}</a>
                                @endif
                            </td>
                            <td>{{ $account->created_at->format('H:i  d-m-Y') }}</td>
                            <td><a href="{{ route('accounts.show', $account->id) }}">Show</a></td>
                            <td><a href="{{ route('accounts.edit', $account->id) }}"><i
                                class="fas fa-edit fa-lg text-info"></i></a>
                                @cannot('teller')
                                    <a href="{{ route('accounts.destroy', $account->id) }}"
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
