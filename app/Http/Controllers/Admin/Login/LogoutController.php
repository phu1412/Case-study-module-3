<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->forget('login-admin');
        Auth::logout();
        return redirect()->route('loginAdmin.index');
    }
}
