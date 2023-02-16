<?php

namespace App\Http\Controllers;

use App\CompniesDetail;
use App\Order;
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
        // check if admin purchased subscription plan
        $user = Auth::user();
        if($userRole = $user->getRoleNames()[0] == 'admin' && !Auth::user()->subscribed(config('constants.subscription_plan'))){
            toast('Please subscribe most suitable plan for you. Thank you !','warning');
            return redirect(route('pricingplan'));
        }
        // check if company detail exists
        $companyDetail = CompniesDetail::where('user_id', Auth::user()->id)->first();
        if(is_null($userRole = $user->getRoleNames()[0] == 'admin'  && $companyDetail)){
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
        $user = Auth::user();
        $orders = Order::with(['company'])->where('user_id', $user->id)->take(10)->get();
        return view('dashboards.user_dashbaord', compact([
            'orders',
            'title',
            'user',
        ]));
    }
}
