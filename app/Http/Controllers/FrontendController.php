<?php

namespace App\Http\Controllers;

use App\CompniesDetail;
use App\Notifications\SendOtpNotification;
use App\Notifications\SendTemporaryPassword;
use App\Plan;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index()
    {
        $title = 'Landing Page';
        $selectedCompany = null;
        $compnies = CompniesDetail::whereNotNull('pricing')->get()->keyBy('id');
        return view('frontend.pages.welcome', compact([
            'compnies',
            'selectedCompany',
            'title',
        ]));
    }

    public function faqIndex()
    {
        $title = 'FAQs';
        return view('frontend.pages.faq', compact([
            'title'
        ]));
    }

    public function contactusIndex()
    {
        $title = 'Contact us';
        return view('frontend.pages.contact_us', compact([
            'title'
        ]));
    }

    public function getQuote($selectedCompany = null)
    {
        $title = 'Get Quotation';
        $compnies = CompniesDetail::whereNotNull('pricing')->get()->keyBy('id');
        return view('frontend.pages.quotation', compact([
            'compnies',
            'selectedCompany',
            'title',
        ]));
    }

    public function pricingPlanIndex()
    {
        $title = 'Pricing Plans';
        $plans = Plan::where('status', 1)->get();
        return view('frontend.pages.pricing_plan', compact([
            'plans',
            'title',
        ]));
    }

    public function companiesList(Request $request)
    {
        $title = 'Companies List';
        $compnies = CompniesDetail::whereNotNull('pricing')->with(['user']);
        if($request->search){
            $compnies = $compnies->where('company_name', 'like', '%' . $request->search . '%');
        }
        $compnies = $compnies->paginate(10);
        return view('company.index', compact([
            'compnies',
            'title',
        ]));
    }

    public function companyDetail(Request $request, $id)
    {
        $title = 'Company Detail';
        $company = CompniesDetail::where('id', Crypt::decrypt($id))->first();
        if($company){
            return view('company.detail', compact([
                'company',
                'title',
            ]));
        }
    }

    public function hiringForm(Request $request, $company = null)
    {
        $title = 'Hiring Form';
        if(!$company){
            $company = CompniesDetail::where('pricing', '!=', NULL)->first()->id;
            $company = Crypt::encrypt($company);
        }
        return view('company.hiring_form', compact([
            'company',
            'title',
        ]));
    }

    public function userHiringDetail(Request $request)
    {
        $request->validate([
            'inspection_date' => 'required',
            'inspection_time' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'city' => 'required|string',
            'area' => 'required|string',
            'zip_code' => 'required|string',
            'address' => 'required|string',
            'company' => 'required|string',
        ]);
        $token = base64_encode(json_encode($request->all()));
        return redirect(route('companies.quotation', $token));
    }

    public function getCompanyQuotationForm($token)
    {
        $title = 'Company Quotation Form';
        $selectedCompany = json_decode(base64_decode($token))->company;
        $selectedCompany = Crypt::decrypt($selectedCompany);
        $compnies = CompniesDetail::where('id', $selectedCompany)->get()->keyBy('id');
        if($compnies){
            return view('company.company_quotation_form', compact([
                'selectedCompany',
                'compnies',
                'title',
                'token',
            ]));
        }else{
            toast('Opps something is wrong. Can\'t find Company Detail!','error');
            return redirect('companies.list');
        }
    }

    public function webClientVerification($user, $sendOtp = false)
    {
        $noFooter = true;
        $title = 'Account Verification Screen';
        $user = User::where('id', Crypt::decrypt($user))->first();
        if(!$user) {
            toast()->error('Opss! can\'t find user detail. Please try with correct data.');
            return redirect(route('login'));
        }
        if($user->email_verified_at){
            toast()->warning('Your account is already verified. Please proceed.');
            return redirect(route('home'));
        }
        if($sendOtp){

            // send email notification
            $otp = rand(0000, 9999);
           Log::info("OTP user ".$user->id. ' OTP '.$otp);

            $user->notify(new SendOtpNotification($user, $otp));
            $user->verification_otp = $otp;
            $user->update();
            return redirect(route('client.verification.screen', Crypt::encrypt($user->id)));
        }

        return view('auth.verify', compact([
            'noFooter',
            'title',
            'user',
        ]));
    }

    public function webClientOtpVerification(Request $request)
    {
        Validator::make($request->all(), [
            'user' => 'required|string',
            'otp' => 'required|numeric',
        ]);

        $userapp = User::where('id', Crypt::decrypt($request->user))->first();
        Log::info("userapp OTP ".json_encode($userapp));

        if(!$userapp->verification_otp || $request->otp != $userapp->verification_otp){
            toast()->error('OTP is not correct. Please try enter correct one. Thank you.');
            return redirect()->back();
        }

        $userapp->verification_otp = null;
        $userapp->email_verified_at = Carbon::now()->toDateTimeString();
        $userapp->update();

        return redirect(route('home'))->with('success', 'Account verificaiton is successfull. Thank you.');
    }

    public function resetPassword(Request $request)
    {
        $title = 'Reset Password';
        return view('auth.passwords.reset', compact([
            'title'
        ]));
    }

    public function sentNewPassword(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        $rendomHash = Str::random(6);
        Log::info('rendomHash '. $rendomHash. 'email - '.$request->email);
        $user = User::where('email',  $request->email)->first();
        $user->password = $rendomHash;
        $user->save();

        $user->notify(new SendTemporaryPassword($user, $rendomHash));
        toast()->success('New Password already sent to your email that you can use to login.');
        return redirect(route('login'));
    }
}
