<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('client.dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">PSB Didibank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 text-center">
            <div class="info" style="padding-left:0px">
                <h4><a href="{{ route('loginUser.logout') }}" class="d-block ">{{ $user->user_name }}</a></h4>
            </div>
        </div>

        <!-- Sidebar Menu -->
        @include('client.layouts.sidebar-menu')
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
