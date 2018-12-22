<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class MasterComposer extends Controller
{
    /**
     * [compose description]
     * @param  View   $view [description]
     * @return void
     */
    public function compose(View $view)
    {
        $url     = '/api/master';
        $reponse = $this->client->request('GET', $this->url($url));
        $data    = json_decode((string) $reponse->getBody(), true);
        $view->with('data', $data);
    }
}
