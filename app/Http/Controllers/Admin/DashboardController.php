<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \GuzzleHttp\Exception\ClientException;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {
            $response = $this->client->request('GET', $this->url('/api/admin/dashboard'), [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer '.$_COOKIE['access_token'],
                    'Content-Type'  => 'application/json',
                ],
            ]);
            $data = json_decode((string) $response->getBody(), true);
            return view('admin.dashboard', compact('data'));
        }catch(ClientException $e) {
            throw $e;
        }
    }
}
