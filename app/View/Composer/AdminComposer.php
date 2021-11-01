<?php

namespace App\View\Composer;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminComposer
{
    public function compose(View $view)
    {
        $admin = Auth::user();
        $view->with('admin', $admin);
    }
}
