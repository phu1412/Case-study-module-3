@extends('client.master-client')

@section('title')
    Tranfers electric
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
            <div class="small-box bg-light">
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
            <h4 class="text-center">Hóa đơn tiền điện</h4>
            <p class="text-center">Hỗ trợ cho các khách hàng đã đăng kí thanh toàn online</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-light">Tài khoản nguồn</label>
                            <select class="form-control" name="from_account">
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-light">Thông tin giao dịch</label>
                            <select class="form-control" name="to_account">
                                <option>EVN Miền Trung</option>
                                <option>EVN Miền Bắc</option>
                                <option>EVN Miền Nam</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-light">Mã khách hàng</label>
                            <input class="form-control" name="" placeholder="Mã khách hàng">
                        </div>
                        <button type="submit" class="btn btn-primary">Tiếp tục</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Quay lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
