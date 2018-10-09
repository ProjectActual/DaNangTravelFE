<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongTacVienController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.cong_tac_vien.index');
    }
}
