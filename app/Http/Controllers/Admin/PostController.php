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
}
