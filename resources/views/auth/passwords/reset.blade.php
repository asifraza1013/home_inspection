@extends('frontend.layouts.layouts')

@section('content')
        <!-- Page title -->
        <section id="page-title" data-bg-parallax="images/parallax/5.jpg">
            <div class="container">
                <div class="page-title">
                    <h1>Reset Password</h1>
                    <span>Please enter your email. New password will be sent to your email address.</span>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="active"><a href="">Password Recover</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <!-- Section -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <h2 class="text-center">Forgot Password?</h2>
                        <form class="form-validation" method="POST" action="{{ route('client.reset.password.submit') }}">
                            @csrf
                            <div class="form-group">
                                <p class="center">To receive a new password, enter your email address below.</p>
                                <input type="email" name="email" class="form-control form-white placeholder" placeholder="Enter your email..." required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Recover your Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: Section -->
@endsection
