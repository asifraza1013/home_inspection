@extends('frontend.layouts.layouts')

@section('content')
    <!-- Body Inner -->
    <br><br>
    <div class="body-inner mt-5">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <div class="col-md-8 col-lg-6 d-flex align-items-center">
                    <div class="w-100 px-3 px-sm-5 px-xl-7">

                        <div class="mb-5">
                            <h6 class="h3 mb-1">Welcome back!</h6>
                            <p class="text-muted mb-0">Login to manage your account.</p>
                        </div>
                        <form class="form-validate" action="{{ route('user.manual.registrations') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email"
                                        required="">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Username</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" placeholder="Enter your Username"
                                        required="">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password">Password</label>
                                <div class="input-group show-hide-password">
                                    <input class="form-control" name="password" placeholder="Enter password" type="password"
                                        required="">
                                    <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true"
                                            style="cursor: pointer;"></i></span>
                                </div>
                            </div>
                            <div class="mt-4"><button type="submit" class="btn btn-primary btn-block btn-primary">Sign
                                    up</button>
                            </div>
                        </form>
                        <div class="mt-4 text-center"><small>Already have an acocunt?</small> <a href="{{ route('login') }}"
                                class="small fw-bold">Sign in</a>
                        </div>
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
