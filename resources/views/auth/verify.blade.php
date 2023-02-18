@extends('frontend.layouts.layouts', ['title' => __('Email Verification Page')])

@section('content')
    <!-- Body Inner -->
    <br><br>
    <div class="body-inner mt-5">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <div class="col-md-8 col-lg-6 d-flex align-items-center">
                    <div class="w-100 px-3 px-sm-5 px-xl-7">

                        <div class="mb-5">
                            <h6 class="h3 mb-1">Email Verification!</h6>
                            <p class="text-muted mb-0">Login to manage your account.</p>
                        </div>
                        <form action="{{ route('client.verification.submit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">OTP</label>
                                <input type="hidden" name="user" value="{{ Crypt::encrypt($user->id) }}">
                                <input type="text" name="otp" value="" placeholder="Please enter You OTP" class="form-control">

                               <p>if you Didn't get OTP. <a href="{{ route('client.verification.screen', [Crypt::encrypt($user->id), true]) }}" class="mt-3">Resend</a></p>
                            </div>
                            <button class="btn btn-success btn-sm btn-block" type="submit">Verify Now!</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-lg-6 d-none d-md-block bg-cover"
                    style="background-image: url('{{ asset('frontend/assets/images/site/login.png') }}'); background-repeat: no-repeat;background-color: blue; padding-top: 10px; background-position: revert; background-origin: content-box;">
                    <a href="{{ route('welcome') }}" class="btn btn-white btn-rounded-only btn-rounded position-absolute left-4 top-4"
                        data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Go back Homepage"><i class="icon-home"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end: Body Inner -->
@endsection
