@extends('client.master-client')

@section('title')
    Tranfers
@endsection

@section('content-list')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
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
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Xác nhận thông tin</h4>
            <p>Quý khách vui lòng kiểm tra thông tin giao dịch khởi tạo</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <td>Tài khoản nguồn</td>
                            <td><strong>{{ $from_account->code }}</strong></td>
                        </tr>
                        <tr>
                            <td>Tài khoản đích</td>
                            <td><strong>{{ $to_account->code }}</strong></td>
                        </tr>
                        <tr>
                            <td>Tên người thụ hưởng</td>
                            <td><strong>{{ $to_account->customer->customer_name }}</strong></td>
                        </tr>
                        <tr>
                            <td>Số tiền</td>
                            <td><strong>{{ $check['amounts'] }}</strong></td>
                        </tr>
                        <tr>
                            <td>số tiền phí</td>
                            <td><strong>2200</strong></td>
                        </tr>
                        <tr>
                            <td>Nội dung</td>
                            <td><strong>{{ $check['content'] }}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <form method="post" action="{{ route('tranferAccounts.check') }}">
            @csrf
            <input type="submit" value="Xác nhận" class="btn btn-primary"> <button class="btn btn-secondary"
                onclick="window.history.go(-1); return false;">Back</button>
            <input type="hidden" name="from_id" value="{{ $from_account->id }}">
            <input type="hidden" name="to_id" value="{{ $to_account->id }}">
            <input type="hidden" name="transaction_amount" value="{{ $check['amounts'] }}">
            <input type="hidden" name="transaction_fee" value="2200">
            <input type="hidden" name="content" value={{ $check['content'] }}>
        </form>
    </div>
@endsection
