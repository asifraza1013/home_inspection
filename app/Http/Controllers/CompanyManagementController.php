<?php

namespace App\Http\Controllers;

use App\CompniesDetail;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class CompanyManagementController extends Controller
{
    public function createOrder(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'total_sqare' => 'required|numeric',
            'total_years' => 'required|numeric',
            'item_selection' => 'required|array',
            'item_selection.*' => 'required|string',
            'token' => 'required|string'
        ], [
            'token.string' => 'Please enter correct detail'
        ]);
        if ($validator->fails()) {
            dd($validator);
            toast('Please try with correct data Thanks!','error');
            return redirect()->back();
        }

        $userDetail = json_decode(base64_decode($request->token));
        $companyId = Crypt::decrypt($userDetail->company);
        $companyDetail = CompniesDetail::where('id', $companyId)->first();
        // dd($companyDetail->pricing);
        if(is_null($companyDetail)){
            toast('We are unable to find company detail. please try again with correct data. Thank you!','error');
            return redirect()->back();
        }

        // order price calculation (get user selected services and calculte price accordingly)
        $servicesAmount = 0;
        $servicesPrice = [];
        $selectedServices = [];
        $pricing = $companyDetail->pricing['item_price'];
        foreach ($request->item_selection as $key => $service) {
            if($pricing[$service]){
                array_push($servicesPrice, $pricing[$service]);
                array_push($selectedServices, $companyDetail->pricing['item_name'][$service]);
                $servicesAmount += (float) $pricing[$service];
            }
            continue;
        }

        $yearsTotal = (float) $request->total_years *  (float) $companyDetail->per_year;
        $squareTotal = (float) $request->total_sqare *  (float) $companyDetail->per_square;
        $orderTotal = $servicesAmount + $yearsTotal + $squareTotal;

        $agent = User::role('Agent')->inRandomOrder()->first();
        dd($agent);
        // $teachers = User::role('Teacher')->get(); inRandomOrder

        $order = New Order();
    }
}
