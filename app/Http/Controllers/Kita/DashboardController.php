<?php

namespace App\Http\Controllers\Kita;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admins.dashboard.index');
    }
}
