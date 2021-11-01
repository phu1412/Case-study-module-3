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
            <h3 class="card-title">Employee Infomation </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>List</th>
                        <th>Infomation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Full Name</td>
                        <td>
                            {{ $employeeInfo->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Personal Email</td>
                        <td>
                            {{ $employeeInfo->personal_email }}
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Phone</td>
                        <td>
                            {{ $employeeInfo->phone }}
                        </td>

                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Birthday</td>
                        <td>
                            {{ $employeeInfo->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Address</td>
                        <td>
                            {{ $employeeInfo->address }}
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Citizen Identification</td>
                        <td>
                            {{ $employeeInfo->citizen_identification }}
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Join Company Date</td>
                        <td>
                            {{ $employeeInfo->join_company_date }}
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Gender</td>
                        <td>
                            {{ $employeeInfo->gender }}
                        </td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Image</td>
                        <td>
                            <img src="{{ asset('images/' . $employeeInfo->image) }}" alt="" style="width: 150px">
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Position</td>
                        <td>
                            @if ($employeeInfo->position_id)
                                {{ $employeeInfo->position->position }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Branch</td>
                        <td>
                            @if ($employeeInfo->position_id)
                                {{ $employeeInfo->position->branch }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Basic Salary</td>
                        <td>
                            @if ($employeeInfo->position_id)
                                {{ number_format($employeeInfo->position->basic_salary) . ' VND' }}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix ">
            <button class="btn btn-secondary float-right" onclick="window.history.go(-1); return false;">Back</button>
        </div>
    </div>
@endsection
