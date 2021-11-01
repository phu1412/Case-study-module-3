<?php

namespace App\View\Composer;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();
        $view->with('user', $user);
    }
}
