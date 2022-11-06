@extends('frontend.layouts.layouts')

@section('content')
    <section id="page-title" class="text-light"
        style="background-image: url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}')">
        <div class="container">
            <div class="page-title">
                <h1 class="bold">Form</h1>
                {{-- <span>To get an instant quote for a Professional Home Inspection or auxiliary service, <br> please fill out
                    this quick and easy form and provide the information for the most accurate quote</span> --}}
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="active"><a href="#">Form</a>
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
                            <form action="{{ route('companies.hiring.form.submit') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 m-auto"><label for="">Inspection date :</label></div>
                                    <div class="col-lg-8"><input type="date" name="inspection_date" class="form-control" placeholder=""></div>
                                    <div class="col-lg-4 mt-2 m-auto"><label for="">Inspection time :</label></div>
                                    <div class="col-lg-8 mt-2"><input type="time" name="inspection_time" class="form-control" placeholder=""></div>
                                    <hr class="mt-3">

                                    <div class="col-lg-4 mt-2 m-auto"><label for="">First Name :</label></div>
                                    <div class="col-lg-8 mt-2"><input type="text" name="first_name" class="form-control" placeholder="First Name"></div>
                                    <div class="col-lg-4 mt-2 m-auto"><label for="">Last Name :</label></div>
                                    <div class="col-lg-8 mt-2"><input type="text" name="last_name" class="form-control" placeholder="Last Name"></div>
                                    <div class="col-lg-4 mt-2 m-auto"><label for="">Email :</label></div>
                                    <div class="col-lg-8 mt-2"><input type="email" name="email" class="form-control" placeholder="EMAIL"></div>
                                    <div class="col-lg-4 mt-2 m-auto"><label for="">Contact Number :</label></div>
                                    <div class="col-lg-8 mt-2"><input type="text" name="contact_number" class="form-control" placeholder="Contact Number"></div>

                                    <hr class="mt-3">
                                    <div class="col-lg-4 mt-2 m-auto"><label for="">City :</label></div>
                                    <div class="col-lg-8 mt-2"><input type="text" name="city" class="form-control" placeholder="City"></div>
                                    <div class="col-lg-4 mt-2 m-auto"><label for="">Area :</label></div>
                                    <div class="col-lg-8 mt-2"><input type="text" name="area" class="form-control" placeholder="Area"></div>
                                    <div class="col-lg-4 mt-2 m-auto"><label for="">Zipcode :</label></div>
                                    <div class="col-lg-8 mt-2"><input type="number" name="zip_code" class="form-control" placeholder="Zipcode"></div>
                                    <div class="col-lg-4 mt-2 m-auto"><label for="">Address :</label></div>
                                    <div class="col-lg-8 mt-2"><input type="text" name="address" class="form-control" placeholder="Address"></div>
                                </div>
                                <input type="hidden" name="company" value="{{ $company }}">
                                <div class="button mt-3 ">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm rounded-0">Confirm</button>
                                </div>
                            </form>
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
