@extends('admin.master')

@section('title')
    Employee Info
@endsection

@section('title-content')
    Employee Info Table
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('employees_info.create') }}" class="btn btn-primary">Add Employee Info</a>
            <form method="post" action="{{ route('employees_info.search') }}" class="float-right">
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
                        <th>Position</th>
                        <th>Info Details</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employeeInfos as $key => $employeeInfo)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $employeeInfo->name }}</td>
                            <td>{{ $employeeInfo->personal_email }}</td>
                            <td>{{ $employeeInfo->phone }}</td>
                            <td>
                                @if ($employeeInfo->position_id)
                                    {{ $employeeInfo->position->position }}
                                @else
                                    Intern
                                @endif
                            </td>
                            <td><a href="{{ route('employees_info.show', $employeeInfo->id) }}">Show</a></td>
                            <td>{{ $employeeInfo->created_at->format('H:i  d-m-Y') }}</td>
                            <td><a href="{{ route('employees_info.edit', $employeeInfo->id) }}"><i
                                class="fas fa-edit fa-lg text-info"></i></a>
                                <a href="{{ route('employees_info.destroy', $employeeInfo->id) }}"><i
                                    class="fas fa-trash-alt text-danger fa-lg"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
