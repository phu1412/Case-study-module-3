<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Danh sách tài khoản
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($user->customer->account as $key => $value)
                    <li class="nav-item" style="padding-left:10px">
                        <a href="{{ route('accountInfo.show', $value->id) }}" class="nav-link ">
                            <p>{{ ++$key . '. ' . $value->code }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                    Số dư
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($user->customer->account as $key => $value)
                    <li class="nav-item" style="padding-left:10px">
                        <a href="" class="nav-link text-light">
                            <p>{{ 'Acc ' . ++$key . ': ' . number_format($value->amounts) . ' VND' }}
                            </p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-phone-square-alt"></i>
                <p>
                    Dịch vụ CSKH 24/7
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>1900 66 88 74</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>1900 44 99 16</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
