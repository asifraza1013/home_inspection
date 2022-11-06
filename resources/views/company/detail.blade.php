@extends('frontend.layouts.layouts')

@section('content')
    <section id="page-title" class=""
        style="background-image: url('{{ asset('frontend/assets/images/co_detail_banner.png') }}'); padding: 145px 0;">
        <div class="container">
            <div class="page-title">
                <h4 class="bold text-black bg-light w-25 p-3 m-auto">{{ $company->company_name }}</h4>
            </div>
        </div>
    </section>
    <section>
       <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <section class="m-0 p-0">
                    <div class="">
                        <div class="card" style="border: 1px solid blue;">
                            <div class="card-body">
                                <div class="image">
                                    <img src="{{ $company->user->profile_photo ? $company->user->profile_photo : asset('frontend/assets/images/about/profile 1.png') }}" alt="" class="w-100" style="border: 1px solid blue;">
                                </div>
                                <div class="mt-2">
                                    <h4 class="bold text-mgreen text-center">{{ $company->company_name }}</h4>
                                </div>
                                <hr>
                                <div class="buttons mt-2 text-center">
                                    <div class="group d-flex justify-content-between">
                                        <a href="{{ route('quotation', $company->id) }}" class="btn btn-primary btn-small rounded-0">Get Quote</a>
                                        <a href="{{ route('companies.hiring.form', Crypt::encrypt($company->id)) }}" class="btn btn-primary btn-small rounded-0">&nbsp &nbsp Hire &nbsp &nbsp </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="bold text-mgreen">About us!!</h2>
                    </div>
                    <div class="card-body">
                        <div class="description p-3"
                            style="border: 1px solid lightgray; border-top: 0px; border-bottom: 2px solid #0A2FB6">
                            <p class="text-mgreen">{{ $company->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </section>
@endsection
