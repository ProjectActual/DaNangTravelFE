<?php

namespace App\Http\Controllers\Viewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request, $uri_category)
    {
        $url                = "/api/posts/{$uri_category}";

        $page   = empty($request->page) ? '' : $request->page;
        $search = empty($request->search) ? '' : $request->search;

        $response = $this->client->request('GET', "{$this->url($url)}", [
                'query' => [
                    'page'     => $page,
                    'search'   => $request->search,
                ],
            ]);

        $data = json_decode((string) $response->getBody(), true);

        return view('viewer.posts.index', compact('data'));
    }

    public function show(Request $request, $uri_category, $uri_post)
    {
        $session_name = session()->get('unique_session_name');

        $url                = "/api/posts/{$uri_category}/$uri_post?session_name=$session_name";

        $response = $this->client->request('GET', "{$this->url($url)}");
        $data = json_decode((string) $response->getBody(), true);

        $post         = $data['post'];
        $relationPost = $data['relationPost'];

        return view('viewer.posts.show', compact('post', 'relationPost'));
    }

    public function search(Request $request)
    {
            $page = empty($request->page) ? '' : $request->page;

            $url                = "/api/search";
            $response = $this->client->request('GET', "{$this->url($url)}", [
                'query' => [
                    'search' => $request->search,
                    'page'   => $page,
                ],
            ]);
            $data   = json_decode((string) $response->getBody(), true);

            $search = $request->search;

            return view('viewer.search', compact('data', 'search'));
    }
}
