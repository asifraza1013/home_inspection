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
                    @foreach ($plans as $plan)
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan border text-mgreen">
                            <div class="plan-header">
                                <h4>{{ $plan->name }}</h4>
                                <p class="text-muted">{{ $plan->description }}</p>
                                <div class="plan-price"><sup>{{ currency() }}</sup>{{ $plan->price }}<span>/mo</span> </div>
                            </div>
                            <div class="plan-list">
                                <ul>
                                    @foreach ($plan->features as $feature)
                                        <li><i class="fas fa-check m-1"></i>{{ $feature }} </li>
                                    @endforeach
                                </ul>
                                <hr>
                                <div class="container">
                                    <img src="{{ $plan->image }}" alt="" class="img-fluid m-b-40 w-100 rounded">
                                </div>
                                <hr>
                                <div class="plan-button">
                                    <a href="{{ route('subscription.summary', Crypt::encrypt($plan->id)) }}" class="btn btn-light">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end: Pricing Table -->
                <hr class="space">
            </div>
        </section>
        <!-- end: Pricing Table Default -->
@endsection
