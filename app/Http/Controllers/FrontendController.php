<?php

namespace App\Http\Controllers;

use App\CompniesDetail;
use App\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $title = 'Landing Page';
        $compnies = CompniesDetail::all()->keyBy('id');
        return view('frontend.pages.welcome', compact([
            'title',
            'compnies',
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

    public function companiesList()
    {
        $title = 'Companies List';
        $compnies = CompniesDetail::with(['user'])->get();
        return view('company.index', compact([
            'compnies',
            'title',
        ]));
    }
}
