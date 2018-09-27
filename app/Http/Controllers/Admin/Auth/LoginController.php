<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function formLogin()
    {
        return view('admin.auth.login');
    }

    public function forgetPassword()
    {
        return view('admin.auth.forget');
    }
}
