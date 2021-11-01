<?php

namespace App\Repositories\Admin\Login\Eloquents;

use App\Repositories\Admin\Login\Interfaces\LoginInterface;
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

        if (Auth::attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }
}
