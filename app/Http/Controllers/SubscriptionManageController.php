<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionManageController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-plan')->except(['profile', 'profileUpdate']);
        $this->middleware('permission:create-plan', ['only' => ['create','store']]);
        $this->middleware('permission:update-plan', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-plan', ['only' => ['destroy']]);
    }

    public function index()
    {
        dd('planList');
    }

    public function create()
    {
        dd('create plan');
    }

    public function store(Request $request)
    {
        dd('store plan');
    }

    public function edit($id)
    {
        dd('edit plan');
    }

    public function update(Request $request, $id)
    {
        dd('update plan');
    }

    public function delete($id)
    {
        dd('delete plan');
    }
}
