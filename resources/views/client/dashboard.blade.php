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

        <div class="col-6">
            @if (Session::has('successTranfer'))
                <h4 class="text-center">PSB Digibank</h4>
                <p class="text-success text-center">
                    <i class="fa fa-check" aria-hidden="true"></i>
                </p>
                <p class="text-center"> Chuyển khoản thành công </p>
                <h4 class="text-center"><strong
                        class="text-success">{{ number_format(Session::get('successTranfer')['success']->transaction_amount) . 'VND' }}</strong>
                </h4>
                <table class="table">
                    <tr>
                        <td>Tên người thụ hưởng</td>
                        <td>{{ Session::get('successTranfer')['success']->toAccount->customer->customer_name }}</td>
                    </tr>
                    <tr>
                        <td>Tài khoản thụ hưởng</td>
                        <td>{{ Session::get('successTranfer')['success']->toAccount->code }}</td>
                    </tr>
                    <tr>
                        <td>Mã giao dịch</td>
                        <td>{{ Session::get('successTranfer')['success']->code }}</td>
                    </tr>
                    <tr>
                        <td>Nội dung</td>
                        <td>{{ Session::get('successTranfer')['success']->content }}</td>
                    </tr>
                    <tr>
                        <td>Thời gian giao dịch</td>
                        <td>{{ Session::get('successTranfer')['success']->created_at->format('H:i  d-m-Y') }}</td>
                    </tr>
                </table>
            @endif
        </div>
    </div>
@endsection
