@extends('admin.master')

@section('title')
    User Account
@endsection

@section('title-content')
    Users Table
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a> <a
                href="{{ route('users.export') }}" class="btn btn-success">Export Excel</a>
            <form method="post" action="{{ route('users.search') }}" class="float-right">
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
                    <th>Created At</th>
                    <th>Customer Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('H:i  d-m-Y') }}</td>
                        <td>
                            @if (isset($user->customer->id))
                                <a href="{{ route('customers.show', $user->customer->id) }}">Show</a>
                            @else
                                Chưa liên kết với Customer
                            @endif
                        </td>
                        <td><a href="{{ route('users.edit', $user->id) }}"><i
                                    class="fas fa-edit fa-lg text-info"></i></a>
                            @cannot('teller')
                                <a href="{{ route('users.destroy', $user->id) }}"
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
