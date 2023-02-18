<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PlanManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-plan', ['only' => ['index']]);
        $this->middleware('permission:create-plan', ['only' => ['create','store']]);
        $this->middleware('permission:update-plan', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-plan', ['only' => ['destroy']]);
        $this->middleware('permission:purchase-plan', ['only' => ['purchasePlanSummary', 'procceddPlanSubscription']]);
    }

    public function index()
    {
        $title = 'Plan List';
        $plans = Plan::paginate(15);
        return view('admin.plans.index', compact([
            'plans',
            'title',
        ]));
    }

    public function create()
    {
        $title = 'Create New Plan';
        $key = \config('services.stripe.secret');
        $stripe = new \Stripe\StripeClient($key);
        $plansraw = $stripe->plans->all();
        $plans = $plansraw->data;
        foreach($plans as $plan) {
            $prod = $stripe->products->retrieve(
                $plan->product,[]
            );
            $plan->product = $prod;
        }
        return view('admin.plans.create', compact([
            'plans',
            'title',
        ]));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'features' => 'required|array',
            'features.*' => 'required|string',
            'status' => 'required|string',
            'stripe_plan' => 'required|string',
            'price' => 'required|string',
            'can_order' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'token.string' => 'Please enter correct detail'
        ]);
        if ($validator->fails()) {
            // dd($validator->errors()->getMessages());
            validationMessages($validator->errors()->getMessages());
            return redirect()->back();
        }

        $existPlan = Plan::where('name', $request->name)->withTrashed()->first();
        if($existPlan){
            $existPlan->deleted_at = NULL;
            $existPlan->save();
            toast('Plan with same name existed already.!','success');
            return redirect(route('plans.index'));
        }

        $image = $request->image;
        $destinationPath = 'plan/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);

        $plans = new Plan();
        $plans->name = $request->name;
        $plans->description = $request->description;
        $plans->features = $request->features;
        $plans->price = $request->price;
        $plans->can_order = $request->can_order;
        $plans->image = asset('plan/'.$profileImage);
        $plans->status = $request->status;
        $plans->stripe_plan = $request->stripe_plan;
        $plans->save();
        toast('Plan create successfully!','success');
        return redirect(route('plans.index'));
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        toast('Plan deleted successfully!','success');
        return redirect(route('plans.index'));
    }

    public function purchasePlanSummary($plan)
    {
        $user = Auth::user();
        $title = 'Subscription Summary!';
        $intent = $user->createSetupIntent();
        $plan = Plan::where('id', Crypt::decrypt($plan))->first();
        if(is_null($plan)){
            toast('Opps! we are unable to find plan details. Please try with correct data.', 'error');
            return back();
        }
        return view('admin.plans.summary', compact([
            'intent',
            'plan',
            'title',
        ]));
    }

    public function procceddPlanSubscription(Request $request)
    {
        $user = Auth::user();
        Log::info("user - ".json_encode($user));
        $plan = Plan::where('id', $request->plan)->first();
        if(is_null($plan)){
            toast('Opps! we are unable to find plan details. Please try with correct data.', 'error');
            return back();
        }
        Log::info("planName - ".$request->plan.' . strinpPlan '.json_encode($plan->stripe_plan));
        $userCreation = $user->createAsStripeCustomer();
        Log::info('userCreation '.json_encode($userCreation));
        $subscription = $user->newSubscription(config('constants.subscription_plan'), $plan->stripe_plan)->create($request->token);
        Log::info("Subscription - ".json_encode($subscription));
        if($subscription){
            toast('Congrates! Plan subscribed successfully.', 'success');
            return redirect(route('admin.dashboard'));
        }
        toast('Opps! something is not right. Please try agains.', 'success');
        return redirect(route('pricingplan'));
    }

    public function subscriptionsList(Request $request)
    {

        // $stripe = new \Stripe\StripeClient(
        //     'sk_test_51M2EoYDSFHeRq6UjD9oYLECVTK4fvXjrodbQkfRV0ghj1oh7u6dwGnPjUyFsdzOTikmBUBLes8mnJ3ylhGDopkZf00ZPXD8IRp'
        //   );
        // dd($stripe->subscriptions->all(['limit' => 10]));

        $title = 'Subscriptions List';
        $subscriptions = DB::table('subscriptions')
        ->join('users', 'users.id', '=', 'subscriptions.user_id')
        ->join('plans', 'plans.stripe_plan', '=', 'subscriptions.stripe_plan')
        ->paginate(setting('record_per_page', 15));
        return view('admin.subscription.index', compact([
            'subscriptions',
            'title',
        ]));
    }
}
