<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $analytic = Analytics::fetchMostVisitedPages(Period::days(7));

        dd($analytic);
        return view('admin.dashboard');
    }
}
