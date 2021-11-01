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
            <h3 class="card-title">Customers Infomation </h3>
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
                            {{ $customer->customer_name }}
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Email</td>
                        <td>
                            {{ $customer->email }}
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Phone</td>
                        <td>
                            {{ $customer->phone }}
                        </td>

                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Birthday</td>
                        <td>
                            {{ $customer->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Address</td>
                        <td>
                            {{ $customer->address }}
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Citizen Identification</td>
                        <td>
                            {{ $customer->citizen_identification }}
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Job</td>
                        <td>
                            {{ $customer->job }}
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Gender</td>
                        <td>
                            {{ $customer->gender }}
                        </td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Image Before CI</td>
                        <td>
                            <img src="{{ asset('images/' . $customer->images_BCI) }}" alt="" style="width: 150px">
                        </td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Image After CI</td>
                        <td>
                            <img src="{{ asset('images/' . $customer->images_ACI) }}" alt="" style="width: 150px">
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
