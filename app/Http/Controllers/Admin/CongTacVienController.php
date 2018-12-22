<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;

class CongTacVienController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.cong_tac_vien.index');
    }

    public function credential(Request $request)
    {
        try {
            $url      = $this->url('/api/admin/getUser');
            $response = $this->client->request('GET', $url,[
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer '.$_COOKIE['access_token'],
                    'Content-Type'  => 'application/json',
                ],
            ]);
            $data    = json_decode((string) $response->getBody(), true);
            $profile = $data['data']['profile']['data']['attributes'];
            //check value if empty redirect to profile
            if(!empty($profile['birthday']) || !empty($profile['phone'])) {

                return redirect()->route('admin.profile.index');
            }
            return view('admin.cong_tac_vien.credential', compact('data'));
        }catch(ClientException $e) {
            throw $e;
        }
    }
}
