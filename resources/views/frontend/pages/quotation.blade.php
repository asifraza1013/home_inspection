@extends('frontend.layouts.layouts')

@section('content')
<section id="page-title" class="text-light" style="background-image: url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}')">
    <div class="container">
        <div class="page-title">
            <h1 class="bold">Get Quotation</h1>
            <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
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
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Select Company:</label>
                            </div>
                            <div class="col-lg-6">
                                <select name="" id="" class="form-control">
                                    <option value="" disabled selected>Please select --</option>
                                    <option value="">Sun Home inspection</option>
                                    <option value="">Sun Home inspection</option>
                                    <option value="">Sun Home inspection</option>
                                    <option value="">Sun Home inspection</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Square Footage:</label>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <select name="" id="" class="form-control">
                                    <option value="" disabled selected>Please select --</option>
                                    <option value="">500</option>
                                    <option value="">500</option>
                                    <option value="">500</option>
                                    <option value="">500</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Year Built:</label>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <select name="" id="" class="form-control">
                                    <option value="" disabled selected>Please select --</option>
                                    <option value="">10 Years</option>
                                    <option value="">10 Years</option>
                                    <option value="">10 Years</option>
                                    <option value="">10 Years</option>
                                </select>
                            </div>
                        </div>
                        <hr class="text-dgreen">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Home Size:</label>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <input type="text" class="form-control" name="" placeholder="Home Size:	">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Townhouse:</label>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <input type="text" class="form-control" name="" placeholder="Townhouse:	">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Condo:</label>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <input type="text" class="form-control" name="" placeholder="Condo:	">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Age Fee:</label>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <input type="text" class="form-control" name="" placeholder="Age Fee:">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Pool or Spa:</label>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <input type="text" class="form-control" name="" placeholder="Pool or Spa:">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Termite:</label>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <input type="text" class="form-control" name="" placeholder="Termite:">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Trip Charge:</label>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <input type="text" class="form-control" name="" placeholder="Trip Charge:">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Re-Inspection:</label>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <input type="text" class="form-control" name="" placeholder="Re-Inspection:">
                            </div>
                        </div>
                        <hr class="text-dgreen">
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for=""><strong>Total:</strong></label>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="text-dgreen">150$</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-1">
                <img src="{{ asset('frontend/assets/images/site/faq.png') }}" alt="" class="img-fluid m-b-40 w-75" style="border: 2px solid #0A2FB6">
            </div>
        </div>
    </div>
</section>
@endsection
