<?php

namespace App\Http\Controllers;

use App\CompniesDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:superadmin-dashboard', ['only' => ['superAdminDashboard']]);
        $this->middleware('permission:admin-dashboard', ['only' => ['adminDashboard']]);
        $this->middleware('permission:user-dashboard', ['only' => ['userDashboard']]);
    }

    public function superAdminDashboard()
    {
        $title = 'Super Admin Dashboard';
        return view('dashboards.super_admin_dashboard', compact([
            'title',
        ]));
    }

    public function adminDashboard()
    {
        // check if company detail exists
        $companyDetail = CompniesDetail::where('user_id', Auth::user()->id)->first();
        if(is_null($companyDetail)){
            toast('Please setup required details before proceed. Thank you!','warning');
            return redirect(route('user.profile'));
        }
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
