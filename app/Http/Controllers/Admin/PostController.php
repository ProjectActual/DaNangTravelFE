<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function update($id)
    {
        $reponse_categories = $this->client->request('GET', $this->url('/api/admin/categories'), [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$_COOKIE['access_token'],
                'Content-Type'  => 'application/json',
            ],
        ]);

        $categories = json_decode((string) $reponse_categories->getBody(), true);

        $reponse_posts = $this->client->request('POST', $this->url("/api/admin/posts/edit/{$id}"), [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$_COOKIE['access_token'],
                'Content-Type'  => 'application/json',
            ],
        ]);
        $post = json_decode((string) $reponse_posts->getBody(), true);

        return view('admin.posts.update', compact('post', 'categories'));
    }
}
