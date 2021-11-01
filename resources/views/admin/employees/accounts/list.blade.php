@extends('admin.master')

@section('title')
    Account Admin
@endsection

@section('title-content')
    Account Admin Table
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('employeesAccounts.create') }}" class="btn btn-primary">Add Account Admin</a>
            <form method="post" action="{{ route('employeesAccounts.search') }}" class="float-right">
                @csrf
                <div class=" input-group
                input-group-sm" style="width: 180px; padding-top: 4px">

                    <input type="text" name="keyword" class="form-control float-right" placeholder="Search">
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
                    <th>Nick Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $key => $account)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->role }}</td>
                        <td>{{ $account->created_at->format('H:i  d-m-Y') }}</td>
                        <td>
                            <img src="{{ asset('images/' . $account->image) }}" alt="" style="width: 120px">
                        </td>
                        <td><a href="{{ route('employeesAccounts.edit', $account->id) }}"><i
                                    class="fas fa-edit fa-lg text-info"></i></a>
                            <a href="{{ route('employeesAccounts.destroy', $account->id) }}"><i
                                    class="fas fa-trash-alt text-danger fa-lg"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
