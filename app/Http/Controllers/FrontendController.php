<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $title = 'Landing Page';
        return view('frontend.pages.welcome', compact([
            'title'
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

    public function getQuote()
    {
        $title = 'Get Quotation';
        return view('frontend.pages.quotation', compact([
            'title'
        ]));
    }

    public function pricingPlanIndex()
    {
        $title = 'Pricing Plans';
        return view('frontend.pages.pricing_plan', compact([
            'title'
        ]));
    }

    // public function companiesList()
    // {
    //     $title = 'Companies List';
    //     return
    // }
}
