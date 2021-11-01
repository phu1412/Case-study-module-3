@extends('client.master-client')

@section('title')
    Dashboard
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
            <div class="small-box bg-info">
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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chi tiết thông tin tài khoản</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Danh sách</th>
                        <th>Thông tin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Chủ tài khoản</td>
                        <td>
                            {{ $account->customer->customer_name }}
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Số tài khoản</td>
                        <td>
                            {{ $account->code }}
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Loại tài khoản</td>
                        <td>
                            {{ $account->type_of_account }}
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Cấp độ tài khoản</td>
                        <td>
                            {{ $account->brand_account }}
                        </td>

                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Chi nhánh</td>
                        <td>
                            {{ $account->place_of_creation }}
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Số dư hiện tại</td>
                        <td>
                            {{ number_format($account->amounts) . ' VND' }}
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Ngày mở tài khoản</td>
                        <td>
                            {{ $account->created_at->format('H:i  d-m-Y') }}
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
