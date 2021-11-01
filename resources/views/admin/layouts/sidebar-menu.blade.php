<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="fas fa-users nav-icon"></i>
                <p>
                    Customers Management
                    <i class="right fas "></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Users i-Banking</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('customers.index') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accounts.index') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Accounts Bank</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cards.index') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Cards Bank</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transactions.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Transactions</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    @can('ceo')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="fas fa-users nav-icon"></i>
                    <p>
                        Employees Management
                        <i class="right fas "></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employeesAccounts.index') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Employees Account</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employees_info.index') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Employees Info</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('position.index') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Position</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    @endcan
</nav>
