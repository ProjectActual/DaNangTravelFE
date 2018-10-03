<?php

namespace App\Http\Controllers\Viewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request, $uri_category)
    {
        $url                = "/api/posts/{$uri_category}";

        $page = empty($request->page) ? '' : $request->page;

        $response = $this->client->request('GET', "{$this->url($url)}?page={$page}");

        $data = json_decode((string) $response->getBody(), true);

        return view('viewer.posts.index', compact('data'));
    }

    public function show(Request $request, $uri_category, $uri_post)
    {
        $url                = "/api/posts/{$uri_category}/$uri_post";

        $response = $this->client->request('GET', "{$this->url($url)}");

        $data = json_decode((string) $response->getBody(), true);

        $post         = $data['post'];
        $relationPost = $data['relationPost'];

        return view('viewer.posts.show', compact('post', 'relationPost'));
    }
}
