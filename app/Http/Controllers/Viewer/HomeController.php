<?php

namespace App\Http\Controllers\Viewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $url                = '/api';

        $reponse = $this->client->request('GET', $this->url($url));

        $data = json_decode((string) $reponse->getBody(), true);

        return view('viewer.home', compact('data'));
    }
}
