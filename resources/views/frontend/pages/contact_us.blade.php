@extends('frontend.layouts.layouts')

@section('content')
<section id="page-title" class="text-light" style="background-image: url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}')">
    <div class="container">
        <div class="page-title">
            <h1 class="bold">Contact Us!</h1>
            <span>You can contact our home inspection company by sending us a message by clicking the button below. </span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="active"><a href="">contactus</a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="bold text-dgreen">Get in touch and let us know how we can help:</h3>

                <form class="form-validate">
                    <div class="form-group ">
                        <div class="input-group show-hide-password">
                            <input class="form-control" name="password" placeholder="Enter Your Name" type="text"
                                required="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="input-group show-hide-password">
                            <input class="form-control" name="password" placeholder="Enter Your email address" type="email"
                                required="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="input-group show-hide-password">
                            <textarea name="message" id="message" cols="30" class="form-control" rows="10" placeholder="Enter your messege"></textarea>
                        </div>
                    </div>
                    <div class="mt-4"><button type="submit" class="btn btn-primary text-right btn-primary">send</button>
                    </div>
                </form>
            </div>
            <div class="offset-1 col-lg-5 bg-cover d-none d-md-block" style="background-image: url('{{ asset('frontend/assets/images/site/faq.png') }}');background-repeat: no-repeat;background-color: blue; padding-top: 10px; background-position: revert; background-origin: content-box;">
                <div class="contact-box my-auto text-light text-center p-3" style="width: 300px; height:250px; background:#0A2FB6;position: absolute;top:50%;bottom:50%;margin-left:-70px">
                    {{-- <i class="icon-mobile text-light"></i> --}}
                    <i class="icon-phone fa-3x"></i>
                    <h4 class="bold">480-563-1800</h4>
                    <i class="icon-mail fa-3x mt-1"></i>
                    <h4 class="bold">support@bitwork.com</h4>
                    <span>
                        <i class="icon-twitter fa-2x"></i>
                        <i class="icon-facebook fa-2x"></i>
                        <i class="icon-instagram fa-2x"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
