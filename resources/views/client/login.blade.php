<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page" background="{{ asset('dist/img/bank.jpg') }}"
    style="background-repeat:no-repeat; background-size:1530px 720px">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>PSB </b>Digibank</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login to your account</p>
                @if (Session::has('login-fail'))
                    <div class="login-fail">
                        <p class="text-danger">{{ Session::get('login-fail') }}</p>
                    </div>
                @endif
                <form action="{{ route('loginUser.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="text text-danger">
                            {{ $errors->default->first('email') }}
                        </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="text text-danger">
                            {{ $errors->default->first('password') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="mt-2 mb-3 border border-light"
                    style="padding:5px; border-radius:2%; background-color:rgb(247, 245, 245)">
                    <p>- Với khách hàng đã có tài khoản <span class="inline-block">PSB Digibank</span>: <b><span
                                class="inline-block">Tên đăng nhập</span> là Email đăng ký dịch vụ</b> <br>-
                        Với khách hàng chưa có tài khoản <span class="inline-block">PSB Digibank</span>: <b>Quý khách
                            vui lòng đến các điểm giao dịch của PSB</b>, để đăng kí và sử dụng dịch vụ i-Banking<span
                            class="inline-block"> của PSB Digibank</span>.</p>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
