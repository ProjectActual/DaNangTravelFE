<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;

class ProfileComposer extends Controller
{
    /**
     * [compose description]
     * @param  View   $view [description]
     * @return void
     */
    public function compose(View $view)
    {
        $url     = '/api/admin/user';
        $reponse = $this->client->request('GET', $this->url($url),[
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer '.$_COOKIE['access_token'],
                'Content-Type'  => 'application/json',
            ],
        ]);

        $data    = json_decode((string) $reponse->getBody(), true);

        $view->with('data', $data);
    }
}
