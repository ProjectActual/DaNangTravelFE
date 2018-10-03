<?php

namespace App\Http\Controllers\Viewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(Request $request, $uri_tag)
    {
        $url                = "/api/tag/{$uri_tag}";

        $page = empty($request->page) ? '' : $request->page;

        $response = $this->client->request('GET', "{$this->url($url)}?page={$page}");

        $data = json_decode((string) $response->getBody(), true);

        return view('viewer.tags.index', compact('data'));
    }
}
