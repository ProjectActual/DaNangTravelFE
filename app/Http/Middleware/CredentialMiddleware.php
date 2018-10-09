<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;

class CredentialMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $client = new Client();
        $url                = env('APP_URL_API') . "/api/admin/user";

        $response = $client->request('GET', $url, [
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer '.$_COOKIE['access_token'],
                'Content-Type'  => 'application/json',
            ],
        ]);

        return $next($request);
    }
}
