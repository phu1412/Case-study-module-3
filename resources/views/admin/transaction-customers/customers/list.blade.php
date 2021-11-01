@extends('admin.master')

@section('title')
    Customers
@endsection

@section('title-content')
    Customers Table
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customers</a> <a
            href="{{ route('customers.export') }}" class="btn btn-success">Export Excel</a>
            <form method="post" action="{{ route('customers.search') }}" class="float-right">
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Account Info</th>
                        <th>User Banking</th>
                        <th>Info Details</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $key => $customer)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $customer->customer_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                @if (isset($customer->account->first()->id))
                                    <p class="text text-primary" data-toggle="modal"
                                        data-target="#customer-{{ $customer->id }}">
                                        List
                                    </p>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="customer-{{ $customer->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Account Lists</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tr>
                                                            @foreach ($customer->account as $key => $account)

                                                                <td>
                                                                    <a href="{{ route('accounts.show', $account->id) }}">
                                                                        {{ $account->code }}</a>
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    Not Account Bank
                                @endif
                            </td>
                            <td>
                                @if (isset($customer->user_id))
                                    <span>Exist i-Banking</span>
                                @else
                                    <span>Not i-Banking</span>
                                @endif
                            </td>
                            <td><a href="{{ route('customers.show', $customer->id) }}">Show</a></td>
                            <td>{{ $customer->created_at->format('H:i  d-m-Y') }}</td>
                            <td><a href="{{ route('customers.edit', $customer->id) }}"><i
                                class="fas fa-edit fa-lg text-info"></i></a>
                                @cannot('teller')
                                    <a href="{{ route('customers.destroy', $customer->id) }}"
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
