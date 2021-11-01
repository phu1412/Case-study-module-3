<?php

namespace App\Repositories\Client\Login\Eloquents;

use App\Repositories\Client\Login\Interfaces\LoginInterface;
use Illuminate\Support\Facades\Auth;

class LoginRepository implements LoginInterface
{
    public function login($request)
    {
        $email = $request->email;
        $password = $request->password;

        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        if (Auth::guard('customers')->attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }
}
