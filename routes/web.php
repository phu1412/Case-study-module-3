<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Employees\AccountsController as EmployeesAccountsController;
use App\Http\Controllers\Admin\Employees\EmployeesInfoController;
use App\Http\Controllers\Admin\Employees\PositionController;
use App\Http\Controllers\Admin\Login\LoginController as LoginAdminController;
use App\Http\Controllers\Admin\Login\LogoutController as LogoutAdminController;
use App\Http\Controllers\Admin\TransactionCustomers\AccountsController;
use App\Http\Controllers\Admin\TransactionCustomers\CardsController;
use App\Http\Controllers\Admin\TransactionCustomers\CustomersController;
use App\Http\Controllers\Admin\TransactionCustomers\TransactionsController;
use App\Http\Controllers\Admin\TransactionCustomers\UsersController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\Login\LoginUserController;
use App\Http\Controllers\Client\Login\LogoutUserController;
use App\Http\Controllers\Client\Tranfers\TranferElectricController;
use App\Http\Controllers\Client\Tranfers\TranferMobileController;
use App\Http\Controllers\Client\Tranfers\TranfersController;
use App\Http\Controllers\Client\Tranfers\TransactionUserController;
use App\Http\Controllers\Client\AccountInfo\AccountInfoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin routes

Route::get('/login', [LoginAdminController::class, 'index'])->name('loginAdmin.index')->middleware('checkadmin');
Route::post('/login', [LoginAdminController::class, 'login'])->name('loginAdmin.login');
Route::get('/logout', [LogoutAdminController::class, 'logout'])->name('loginAdmin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'customer-managerment'], function () {
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UsersController::class, 'index'])->name('users.index');
            Route::get('/{id}/show', [UsersController::class, 'show'])->name('users.show');
            Route::get('/create', [UsersController::class, 'create'])->name('users.create');
            Route::post('/create', [UsersController::class, 'store'])->name('users.store');
            Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
            Route::post('/{id}/edit', [UsersController::class, 'update'])->name('users.update');
            Route::get('/{id}/destroy', [UsersController::class, 'destroy'])->name('users.destroy');
            Route::post('/search', [UsersController::class, 'search'])->name('users.search');


            Route::get('/export', [UsersController::class, 'export'])->name('users.export');
        });


        Route::group(['prefix' => 'customers'], function () {
            Route::get('/', [CustomersController::class, 'index'])->name('customers.index');
            Route::get('/{id}/show', [CustomersController::class, 'show'])->name('customers.show');
            Route::get('/create', [CustomersController::class, 'create'])->name('customers.create');
            Route::post('/create', [CustomersController::class, 'store'])->name('customers.store');
            Route::get('/{id}/edit', [CustomersController::class, 'edit'])->name('customers.edit');
            Route::post('/{id}/edit', [CustomersController::class, 'update'])->name('customers.update');
            Route::get('/{id}/destroy', [CustomersController::class, 'destroy'])->name('customers.destroy');
            Route::post('/search', [CustomersController::class, 'search'])->name('customers.search');
            Route::get('/{id}/showAccount', [CustomersController::class, 'showAccount'])->name('customers.showAccount');

            Route::get('/export', [CustomersController::class, 'export'])->name('customers.export');
        });

        Route::group(['prefix' => 'accounts'], function () {
            Route::get('/', [AccountsController::class, 'index'])->name('accounts.index');
            Route::get('/{id}/show', [AccountsController::class, 'show'])->name('accounts.show');
            Route::get('/create', [AccountsController::class, 'create'])->name('accounts.create');
            Route::post('/create', [AccountsController::class, 'store'])->name('accounts.store');
            Route::get('/{id}/edit', [AccountsController::class, 'edit'])->name('accounts.edit');
            Route::post('/{id}/edit', [AccountsController::class, 'update'])->name('accounts.update');
            Route::get('/{id}/destroy', [AccountsController::class, 'destroy'])->name('accounts.destroy');
            Route::post('/search', [AccountsController::class, 'search'])->name('accounts.search');

            Route::get('/export', [AccountsController::class, 'export'])->name('accounts.export');
        });

        Route::group(['prefix' => 'cards'], function () {
            Route::get('/', [CardsController::class, 'index'])->name('cards.index');
            Route::get('/{id}/show', [CardsController::class, 'show'])->name('cards.show');
            Route::get('/create', [CardsController::class, 'create'])->name('cards.create');
            Route::post('/create', [CardsController::class, 'store'])->name('cards.store');
            Route::get('/{id}/edit', [CardsController::class, 'edit'])->name('cards.edit');
            Route::post('/{id}/edit', [CardsController::class, 'update'])->name('cards.update');
            Route::get('/{id}/destroy', [CardsController::class, 'destroy'])->name('cards.destroy');
            Route::post('/search', [CardsController::class, 'search'])->name('cards.search');

            Route::get('/export', [CardsController::class, 'export'])->name('cards.export');
        });

        Route::group(['prefix' => 'transactions'], function () {
            Route::get('/', [TransactionsController::class, 'index'])->name('transactions.index');
            Route::get('/{id}/show', [TransactionsController::class, 'show'])->name('transactions.show');
            Route::get('/create', [TransactionsController::class, 'create'])->name('transactions.create');
            Route::post('/create', [TransactionsController::class, 'store'])->name('transactions.store');
            Route::get('/{id}/edit', [TransactionsController::class, 'edit'])->name('transactions.edit');
            Route::post('/{id}/edit', [TransactionsController::class, 'update'])->name('transactions.update');
            Route::get('/{id}/destroy', [TransactionsController::class, 'destroy'])->name('transactions.destroy');
            Route::post('/search', [TransactionsController::class, 'search'])->name('transactions.search');

            Route::get('/export', [TransactionsController::class, 'export'])->name('transactions.export');

            Route::get('/{id}/export-one', [TransactionsController::class, 'exportOne'])->name('transactionOnes.export');
        });
    });

    Route::group(['prefix' => 'employees', 'middleware' => 'admin'], function () {
        Route::group(['prefix' => 'accounts'], function () {
            Route::get('/', [EmployeesAccountsController::class, 'index'])->name('employeesAccounts.index');
            Route::get('/{id}/show', [EmployeesAccountsController::class, 'show'])->name('employeesAccounts.show');
            Route::get('/create', [EmployeesAccountsController::class, 'create'])->name('employeesAccounts.create');
            Route::post('/create', [EmployeesAccountsController::class, 'store'])->name('employeesAccounts.store');
            Route::get('/{id}/edit', [EmployeesAccountsController::class, 'edit'])->name('employeesAccounts.edit');
            Route::post('/{id}/edit', [EmployeesAccountsController::class, 'update'])->name('employeesAccounts.update');
            Route::get('/{id}/destroy', [EmployeesAccountsController::class, 'destroy'])->name('employeesAccounts.destroy');
            Route::post('/search', [EmployeesAccountsController::class, 'search'])->name('employeesAccounts.search');
        });

        Route::group(['prefix' => 'employees_info'], function () {
            Route::get('/', [EmployeesInfoController::class, 'index'])->name('employees_info.index');
            Route::get('/{id}/show', [EmployeesInfoController::class, 'show'])->name('employees_info.show');
            Route::get('/create', [EmployeesInfoController::class, 'create'])->name('employees_info.create');
            Route::post('/create', [EmployeesInfoController::class, 'store'])->name('employees_info.store');
            Route::get('/{id}/edit', [EmployeesInfoController::class, 'edit'])->name('employees_info.edit');
            Route::post('/{id}/edit', [EmployeesInfoController::class, 'update'])->name('employees_info.update');
            Route::get('/{id}/destroy', [EmployeesInfoController::class, 'destroy'])->name('employees_info.destroy');
            Route::post('/search', [EmployeesInfoController::class, 'search'])->name('employees_info.search');
        });

        Route::group(['prefix' => 'position'], function () {
            Route::get('/', [PositionController::class, 'index'])->name('position.index');
            Route::get('/{id}/show', [PositionController::class, 'show'])->name('position.show');
            Route::get('/create', [PositionController::class, 'create'])->name('position.create');
            Route::post('/create', [PositionController::class, 'store'])->name('position.store');
            Route::get('/{id}/edit', [PositionController::class, 'edit'])->name('position.edit');
            Route::post('/{id}/edit', [PositionController::class, 'update'])->name('position.update');
            Route::get('/{id}/destroy', [PositionController::class, 'destroy'])->name('position.destroy');
            Route::post('/search', [PositionController::class, 'search'])->name('position.search');
        });
    });
});




// User routes

Route::get('/login-user', [LoginUserController::class, 'index'])->name('loginUser.index');
Route::post('/login-user', [LoginUserController::class, 'login'])->name('loginUser.login');
Route::get('/logout-user', [LogoutUserController::class, 'logout'])->name('loginUser.logout');

Route::group(['prefix' => 'client', 'middleware' => 'auth:customers'], function () {

    Route::get('/dashboard', [ClientController::class, 'index'])->name('client.dashboard');

    Route::group(['prefix' => 'tranfers'], function () {
        Route::group(['prefix' => 'tranferAccounts'], function () {
            Route::get('/', [TranfersController::class, 'index'])->name('tranferAccounts.index');
            Route::get('/create', [TranfersController::class, 'create'])->name('tranferAccounts.create');
            Route::post('/storeCheck', [TranfersController::class, 'storeCheck'])->name('tranferAccounts.storeCheck');
            Route::post('/check', [TranfersController::class, 'check'])->name('tranferAccounts.check');
        });

        Route::group(['prefix' => 'transactionsUser'], function () {
            Route::get('/', [TransactionUserController::class, 'index'])->name('transactionsUser.index');
            Route::get('/{id}/show', [TransactionUserController::class, 'show'])->name('transactionsUser.show');
        });

        Route::group(['prefix' => 'tranferMobile'], function () {
            Route::get('/', [TranferMobileController::class, 'index'])->name('tranferMobile.index');
        });

        Route::group(['prefix' => 'tranferElectric'], function () {
            Route::get('/', [TranferElectricController::class, 'index'])->name('tranferElectric.index');
        });
    });
    Route::get('/account-info/{id}/show', [AccountInfoController::class, 'show'])->name('accountInfo.show');
});
