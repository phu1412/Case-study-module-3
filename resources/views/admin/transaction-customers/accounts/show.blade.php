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
            <h3 class="card-title">Account Infomation </h3>
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
                        <td>Account Number</td>
                        <td>
                            {{ $account->code }}
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Type of Account</td>
                        <td>
                            {{ $account->type_of_account }}
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Brand Account</td>
                        <td>
                            {{ $account->brand_account }}
                        </td>

                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Place of Creation</td>
                        <td>
                            {{ $account->place_of_creation }}
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Amounts</td>
                        <td>
                            {{ number_format($account->amounts). ' VND' }}
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Created At</td>
                        <td>
                            {{ $account->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Updated At</td>
                        <td>
                            {{ $account->updated_at }}
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
