@extends('frontend.layouts.layouts')

@section('content')
    <section id="page-title" class="text-light"
        style="background-image: url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}')">
        <div class="container">
            <div class="page-title">
                <h1 class="bold">Get Quotation</h1>
                <span>To get an instant quote for a Professional Home Inspection or auxiliary service, <br> please fill out
                    this quick and easy form and provide the information for the most accurate quote</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="active"><a href="#">Get Quotation</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row h-auto">
                <div class="col-lg-5">
                    <div class="card rounded-0">
                        <div class="card-body get-quote">
                            @include('includes.quotation_block')
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-1">
                    <img src="{{ asset('frontend/assets/images/site/faq.png') }}" alt=""
                        class="img-fluid m-b-40 w-75" style="border: 2px solid #0A2FB6">
                </div>
            </div>
        </div>
    </section>
@endsection
