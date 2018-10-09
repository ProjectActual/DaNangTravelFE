<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        return view('admin.auth.register');
    }

    public function credential(Request $request, $activation_token)
    {
        $url                = "/api/admin/credential/{$activation_token}";

        $response = $this->client->request('POST', $this->url($url));

        $data = json_decode((string) $response->getBody(), true);

        return redirect()->route('admin.formLogin');
    }
}
