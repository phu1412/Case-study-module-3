@extends('admin.master')

@section('title')
    Cards
@endsection

@section('title-content')
    Cards Table
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Card Infomation </h3>
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
                        <td>Code</td>
                        <td>
                            {{ $card->code }}
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Type of Account</td>
                        <td>
                            {{ $card->PIN }}
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Brand Account</td>
                        <td>
                            {{ $card->period }}
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
