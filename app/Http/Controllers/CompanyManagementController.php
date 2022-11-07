<?php

namespace App\Http\Controllers;

use App\CompniesDetail;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class CompanyManagementController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:order-list', ['only' => ['orderList']]);
    }

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

        $user = Auth::user();
        $userDetail = json_decode(base64_decode($request->token));
        // dd($userDetail);
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

        $agent = User::where('company_id', $companyId)->role('agent')->inRandomOrder()->first();

        $order = New Order();
        $order->inspection_date	= $userDetail->inspection_date;
        $order->inspection_time	= $userDetail->inspection_time;
        $order->first_name	= $userDetail->first_name;
        $order->last_name	= $userDetail->last_name;
        $order->email	= $userDetail->email;
        $order->contact_number	= $userDetail->contact_number;
        $order->city	= $userDetail->city;
        $order->area = $userDetail->area;
        $order->zip_code = $userDetail->zip_code;
        $order->address = $userDetail->address;

        $order->user_id = $user->id;

        $order->agent_id = $agent->id;
        $order->company_id = $companyId;

        $order->total_square = $request->total_sqare;
        $order->square_amount = $squareTotal;
        $order->total_years = $request->total_years;
        $order->year_amount = $yearsTotal;
        $order->total = $orderTotal;
        $order->item_selection = $selectedServices;
        $order->item_prices = $servicesPrice;
        $order->save();

        // TODO: send notifications to agent, admin and superadmin

        toast('Order Created success. We will get back to you soon. Thank you for using our services!','success');
        return redirect(route('welcome'));
    }

    public function orderList(Request $request)
    {
        $title = 'Order List';
        $order = Order::with(['agent', 'company']);
        if($request->order == 'unapproved') $order = $order->where('admin_approved', true);
        if($request->order == 'completed') $order = $order->where('status', 5); // completed orders
        $orders =  $order->orderBy('created_at')->paginate(15);
        return view('company.orders.index', compact([
            'title',
            'orders',
        ]));
    }
}
