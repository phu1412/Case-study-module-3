<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login\LoginRequest;
use App\Repositories\Admin\Login\Eloquents\LoginRepository;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $loginRepository;
    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }
    public function index()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $login = $this->loginRepository->login($request);

        if ($login) {
            $request->session()->push('login-admin', true);

            return redirect()->route('admin.dashboard');
        } else {
            $message = 'Đăng nhập không thành công. Tên người dùng hoặc mật khẩu không đúng.';
            return redirect()->route('loginAdmin.index')->with('login-fail', $message);
        }
    }
}
