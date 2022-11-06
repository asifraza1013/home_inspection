<?php

namespace App\Http\Controllers;

use App\CompniesDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FrontendController extends Controller
{
    public function index()
    {
        $title = 'Landing Page';
        $selectedCompany = null;
        $compnies = CompniesDetail::all()->keyBy('id');
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
        $compnies = CompniesDetail::all()->keyBy('id');
        return view('frontend.pages.quotation', compact([
            'compnies',
            'selectedCompany',
            'title',
        ]));
    }

    public function pricingPlanIndex()
    {
        $title = 'Pricing Plans';
        return view('frontend.pages.pricing_plan', compact([
            'title',
        ]));
    }

    public function companiesList(Request $request)
    {
        $title = 'Companies List';
        $compnies = CompniesDetail::with(['user']);
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

    public function hiringForm(Request $request, $company)
    {
        $title = 'Hiring Form';
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
}
