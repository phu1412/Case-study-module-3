@extends('client.master-client')

@section('title')
    Transaction User
@endsection

@section('content-list')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>Chuyển tiền đến STK khác</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('tranferAccounts.create') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>Chuyển khoản tiền Điện</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('tranferElectric.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>Nạp tiền điện thoại</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('tranferMobile.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">

                    <h4>Xem sao kê</h4>

                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('transactionsUser.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-body>">
            <div class="row">
                <div class="col-md-12">
                    <select class="form-control" id="account" name="account">
                        <option>Chọn tài khoản</option>
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}">
                                {{ ' Tài khoản:  ' . $account->code }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped" id="tb-tran">
        <thead>
            <tr>
                <th>#</th>
                <th>Tài khoản đi</th>
                <th>Tài khoản đến</th>
                <th>Số tiền GD</th>
                <th>Phí</th>
                <th>Số dư</th>
                <th>Mã GD</th>
                <th>Nội dung</th>
                <th>Thời gian GD</th>
            </tr>
        </thead>
        <tbody id="result">

        </tbody>
    </table>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#account').on('change', function() {
                var url = '{{ route('transactionsUser.index') }}' + '/' + this.value + '/show'

                $.ajax({
                    url: url,
                    method: 'GET',
                    data: this.value,
                    success: function(response) {
                        if (response.success) {
                            let html = '';
                            for (item of response.success) {
                                html += "<tr>";
                                html += "<td>";
                                html += '';
                                html += "</td>";

                                html += "<td>";
                                html += item.from_account;
                                html += "</td>";

                                html += "<td>";
                                html += item.to_account;
                                html += "</td>";

                                html += "<td>";
                                if (item.from_account ==
                                    '<span class = "text-warning">Your Account</span>') {
                                    html += '<span class="text-danger"> - ' + item
                                        .transaction_amount +
                                        '</span</>';
                                } else if (item.to_account ==
                                    '<span class = "text-warning">Your Account</span>') {
                                    html += '<span class="text-success"> + ' + item
                                        .transaction_amount +
                                        '</span</>';
                                }
                                html += "</td>";

                                html += "<td>";
                                if (item.from_account ==
                                    '<span class = "text-warning">Your Account</span>') {
                                    html += '<span class="text-danger"> - ' + item
                                        .transaction_fee +
                                        '</span</>';
                                } else if (item.to_account ==
                                    '<span class = "text-warning">Your Account</span>') {
                                    html += '';
                                }
                                html += "</td>";

                                html += "<td>";
                                html += item.amount_balance;
                                html += "</td>";

                                html += "<td>";
                                html += item.code;
                                html += "</td>";

                                html += "<td>";
                                html += item.content;
                                html += "</td>";

                                html += "<td>";
                                html += item.created_at;
                                html += "</td>";

                                html += "</tr>";
                            }

                            $('#result').html(html);

                            // $("#result").DataTable({
                            //     lengthChange: false,
                            //     initComplete: function() {
                            //         $(".dataTables_filter").addClass('text-right')
                            //             .remove()
                            //         $("#result_paginate .pagination").css('float',
                            //             'right')
                            //     }
                            // })
                        }
                    }
                })
            })

        });
    </script>
@endsection
