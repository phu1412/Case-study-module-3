@extends('admin.master')

@section('title')
    Position
@endsection

@section('title-content')
    Position Table
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('position.create') }}" class="btn btn-primary">Add Position</a>
            <form method="post" action="{{ route('position.search') }}" class="float-right">
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
                    <th>Position</th>
                    <th>Branch</th>
                    <th>Basic Salary</th>
                    <th>Created At</th>
                    <th>Employee Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positions as $key => $position)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $position->position }}</td>
                        <td>{{ $position->branch }}</td>
                        <td>{{ number_format($position->basic_salary) . ' VND' }}</td>
                        <td>{{ $position->created_at->format('H:i  d-m-Y') }}</td>
                        <td>
                            @if (isset($position->employeesInfo->id))
                                <a href="{{ route('employees_info.show', $position->employeesInfo->id) }}">Show</a>
                            @else
                                Chưa liên kết với Employee
                            @endif
                        </td>
                        <td><a href="{{ route('position.edit', $position->id) }}"><i
                            class="fas fa-edit fa-lg text-info"></i></a>
                            <a href="{{ route('position.destroy', $position->id) }}"><i
                                class="fas fa-trash-alt text-danger fa-lg"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
