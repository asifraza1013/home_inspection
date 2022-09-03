@extends('frontend.layouts.layouts')

@section('content')
<section id="page-title" class="text-light" style="background-image: url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}')">
    <div class="container">
        <div class="page-title">
            <h1 class="bold">Pick the best plan for your company :</h1>
            <span>Professional home inspection company services.</span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="active"><a href="">Pricing Plan</a>
                </li>
            </ul>
        </div>
    </div>
</section>

        <!-- Pricing Table Default -->
        <section id="content">
            <div class="container">
                <!-- Pricing Table -->
                <div class="heading-text heading-line text-center pb-5">
                    <h6 class="text-dgreen">How many people do you have your team?</h6>
                </div>

                <div class="row pricing-table">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan border text-mgreen">
                            <div class="plan-header">
                                <h4>Ultimate Plan</h4>
                                <p class="text-muted">Plan short description</p>
                                <div class="plan-price"><sup>$</sup>80<span>/mo</span> </div>
                                {{-- <div class="countdown small" data-countdown="2022/09/22 11:34:51"></div> --}}
                            </div>
                            <div class="plan-list">
                                <ul>
                                    <li><i class="fas fa-globe-americas"></i>Reprehenderit qui in ea voluptate velit </li>
                                    <li><i class="fa fa-thumbs-up"></i>Voluptatem accusantium doloremque </li>
                                    <li><i class="fa fa-signal"></i>Numquam eius modi tempora</li>
                                    <li><i class="fa fa-user"></i>Qui dolorem ipsum quia dolor</li>
                                    <li><i class="fa fa-star"></i>Consequuntur magni dolores eos qui</li>
                                    <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                                </ul>
                                <hr>
                                <div class="container">
                                    <img src="{{ asset('frontend/assets/images/site/plan3.png') }}" alt="" class="img-fluid m-b-40 w-100 rounded">
                                </div>
                                <hr>
                                <div class="plan-button">
                                    <a href="#" class="btn btn-light">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured border text-mgreen">
                            <div class="plan-header">
                                <h4>Deluxe Plan</h4>
                                <p class="text-muted">Plan short description</p>
                                <div class="plan-price"><sup>$</sup>20<span>/mo</span> </div>
                                {{-- <div class="countdown small" data-countdown="2021/08/11 11:34:51"></div> --}}
                            </div>
                            <div class="plan-list">
                                <ul>
                                    <li><i class="fas fa-globe-americas"></i>Reprehenderit qui in ea voluptate velit </li>
                                    <li><i class="fa fa-thumbs-up"></i>Voluptatem accusantium doloremque </li>
                                    <li><i class="fa fa-signal"></i>Numquam eius modi tempora</li>
                                    <li><i class="fa fa-user"></i>Qui dolorem ipsum quia dolor</li>
                                    <li><i class="fa fa-star"></i>Consequuntur magni dolores eos qui</li>
                                    <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                                </ul>
                                <hr>
                                <div class="container">
                                    <img src="{{ asset('frontend/assets/images/site/plan2.png') }}" alt="" class="img-fluid m-b-40 w-100 rounded">
                                </div>
                                <hr>
                                <div class="plan-button">
                                    <a href="#" class="btn btn-primary">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan border text-mgreen">
                            <div class="plan-header">
                                <h4>Professional Plan</h4>
                                <p class="text-muted">Plan short description</p>
                                <div class="plan-price"><sup>$</sup>69<span>/mo</span> </div>
                                {{-- <div class="countdown small" data-countdown="2021/11/15 11:34:51"></div> --}}
                            </div>
                            <div class="plan-list">
                                <ul>
                                    <li><i class="fas fa-globe-americas"></i>Reprehenderit qui in ea voluptate velit </li>
                                    <li><i class="fa fa-thumbs-up"></i>Voluptatem accusantium doloremque </li>
                                    <li><i class="fa fa-signal"></i>Numquam eius modi tempora</li>
                                    <li><i class="fa fa-user"></i>Qui dolorem ipsum quia dolor</li>
                                    <li><i class="fa fa-star"></i>Consequuntur magni dolores eos qui</li>
                                    <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                                </ul>
                                <hr>
                                <div class="container">
                                    <img src="{{ asset('frontend/assets/images/site/plan1.png') }}" alt="" class="img-fluid m-b-40 w-100 rounded">
                                </div>
                                <hr>
                                <div class="plan-button">
                                    <a href="#" class="btn btn-light">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: Pricing Table -->
                <hr class="space">
            </div>
        </section>
        <!-- end: Pricing Table Default -->
@endsection
