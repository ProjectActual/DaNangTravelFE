<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $client;

    protected $url;

    public function __construct()
    {
        $this->client = new Client();
        $this->url    = 'http://127.0.0.1:8000';
    }

    public function url($uri)
    {
        return $this->url . $uri;
    }
}
