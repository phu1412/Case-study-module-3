<?php

namespace App\Http\Controllers\Client\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutUserController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->forget('login-user');
        
        return redirect()->route('loginUser.index');
    }
}
