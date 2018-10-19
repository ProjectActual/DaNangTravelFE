<?php

namespace App\Http\ViewComposers;

use GuzzleHttp\Client;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ProfileComposer extends Controller
{
    /**
     * get information user
     * @param  View   $view
     * @return void
     */
    public function compose(View $view)
    {
        $url      = $this->url('/api/admin/getUser');
        $response = $this->client->request('GET', $url,[
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer '.$_COOKIE['access_token'],
                'Content-Type'  => 'application/json',
            ],
        ]);
        $data    = json_decode((string) $response->getBody(), true);
        $view->with('data', $data);
    }
}
