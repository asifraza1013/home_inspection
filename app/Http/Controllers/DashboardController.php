<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function superAdminDashboard()
    {
        $title = 'Super Admin Dashboard';
        return view('dashboards.super_admin_dashboard', compact([
            'title',
        ]));
    }

    public function adminDashboard()
    {
        $title = 'Admin Dashboard/Compnies Dashboard';
        return view('dashboards.admin_dashboard', compact([
            'title',
        ]));
    }

    public function userDashboard()
    {
        $title = 'User Dashboard';
        return view('dashboards.user_dashbaord', compact([
            'title',
        ]));
    }
}
