@extends('frontend.layouts.layouts')

@section('content')
    <section id="page-title" class="text-light"
        style="background-image: url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}')">
        <div class="container">
            <div class="page-title">
                <h1 class="bold">Subscription summary</h1>
                <span>To get an instant quote for a Professional Home Inspection or auxiliary service, <br> please fill out
                    this quick and easy form and provide the information for the most accurate quote</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('pricingplan') }}">Plan List</a>
                    </li>
                    <li class="active"><a href="#">Subscription Summary</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row h-auto">
                <div class="col-lg-7">
                    {{-- <div class="card rounded-0">
                        <div class="card-body get-quote">
                            <div class="row">
                                <h4 class="text-center">Subscription Summary</h4>
                                <hr>
                                <div class="col-lg-6">
                                    <label for="">Plan Name</label>
                                    <h4 class="">{{ $plan->name }}</h4>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Total Amount</label>
                                    <h4 class="">{{ $plan->price }}</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <p>you going to subscribe {{$plan->name}} that will charge {{$plan->price}} every month.</p>
                                <p>Please confirm <a href="#">terms and conditions</a> to continue.</p>
                            </div>

                            <div class="">

                            </div>
                        </div>
                    </div> --}}
                    <div class="card">
                        <div class="card-header">
                            You will be charged ${{ number_format($plan->price, 2) }} for {{ $plan->name }} Plan
                        </div>

                        <div class="card-body">

                            <form id="payment-form" action="{{ route('subscription.create') }}" method="POST">
                                @csrf
                                <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                                </div>
                                <div class="form-group">
                                    <label for="">Card details</label>
                                    <div id="card-element"></div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                <hr>
                                    <button type="submit" class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">Purchase</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('frontend/assets/images/site/faq.png') }}" alt=""
                        class="img-fluid m-b-40 w-75" style="border: 2px solid #0A2FB6">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}')

    const elements = stripe.elements()
    const cardElement = elements.create('card')

    cardElement.mount('#card-element')

    const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    const cardHolderName = document.getElementById('card-holder-name')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()

        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )

        if(error) {
            cardBtn.disable = false
        } else {
            let token = document.createElement('input')
            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)
            form.appendChild(token)
            form.submit();
        }
    })
</script>
@endsection
