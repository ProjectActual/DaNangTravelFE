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

        $data = json_decode((string) $response->getBody(), true);

        if($data['data']['profile']['data']['active'] == 'NO' && $data['data']['profile']['data']['roles'][0]['name'] == 'CONGTACVIEN') {
            return redirect()->route('errors.credential.email');
        }

        if($data['data']['profile']['data']['admin_active'] == 'NO' && $data['data']['profile']['data']['roles'][0]['name'] == 'CONGTACVIEN') {
            return redirect()->route('errors.credential.admin');
        }

        return $next($request);
    }
}
