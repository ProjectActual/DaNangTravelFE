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

    public function changePassword($token)
    {
        $url                = "/api/admin/forget-password/{$token}";

        $response = $this->client->request('POST', $this->url($url));

        $data = json_decode((string) $response->getBody(), true);

        return view('admin.auth.change', compact('data'));
    }
}
