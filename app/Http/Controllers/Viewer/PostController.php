<?php

namespace App\Http\Controllers\Viewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request, $uri_category)
    {
        $url                = "/api/{$uri_category}";

        $page = empty($request->page) ? '' : $request->page;

        $response = $this->client->request('GET', "{$this->url($url)}?page={$page}");

        $data = json_decode((string) $response->getBody(), true);

        return view('viewer.posts.index', compact('data'));
    }
}
