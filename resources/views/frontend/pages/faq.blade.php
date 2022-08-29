@extends('frontend.layouts.layouts')

@section('content')
<section id="page-title" class="text-light" style="background-image: url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}')">
    <div class="container">
        <div class="page-title">
            <h1 class="bold">FAQ`S</h1>
            <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="active"><a href="#">FAQs</a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="bold text-dgreen">Frequently Asked Questions</h2>

                <ul class="text-mgreen">
                    <li>Lorem Ipsum is simply dummy text of the printing ?</li>
                    <li>Lorem Ipsum is simply dummy text of ?</li>
                    <li>Lorem Ipsum is simply dummy text of the printing ?</li>
                    <li>Lorem Ipsum is simply dummy text ?</li>
                    <li>Lorem Ipsum is simply dummy text of the printing ?</li>
                    <li>Lorem Ipsum is simply dummy text of the printing ?</li>
                    <li>Lorem Ipsum is simply dummy text ?</li>
                    <li>Lorem Ipsum is simply dummy text ?</li>
                    <li>Lorem Ipsum is simply dummy text ?</li>
                    <li>Lorem Ipsum is simply dummy text of the printing ?</li>
                    <li>Lorem Ipsum is simply dummy text ?</li>
                </ul>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('frontend/assets/images/site/faq.png') }}" alt="" class="img-fluid m-b-40 w-75" style="border: 2px solid #0A2FB6">
            </div>
        </div>
    </div>
</section>
@endsection
