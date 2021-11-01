<?php

namespace App\Http\Controllers\Client\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Login\LoginRequest;
use App\Repositories\Client\Login\Eloquents\LoginRepository;

class LoginUserController extends Controller
{
    private $loginRepository;
    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }
    public function index()
    {
        return view('client.login');
    }

    public function login(LoginRequest $request)
    {
        $login = $this->loginRepository->login($request);

        if ($login) {
            $request->session()->push('login-user', true);

            return redirect()->route('client.dashboard');
        } else {
            $message = 'Đăng nhập không thành công. Tên người dùng hoặc mật khẩu không đúng.';
            return redirect()->route('loginUser.index')->with('login-fail', $message);
        }
    }
}
