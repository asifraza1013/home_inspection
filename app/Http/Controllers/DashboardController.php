<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        $title = 'User Dashboard';
        return view('dashboards.user_dashbaord', compact([
            'title',
        ]));
    }
}
