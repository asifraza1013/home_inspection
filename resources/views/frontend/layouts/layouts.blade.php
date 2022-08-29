<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.png') }}">
    <title>{{ isset($title) ? $title : null }} - HOME INSPECTION</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('frontend/assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo"> <a href="{{ route('welcome') }}"><span class="logo-default text-mblue">LOGO</span><span
                                class="logo-dark">LOGO</span></a> </div>
                    <!--End: Logo-->

                    @if(\Request::route()->getName() != 'login' && \Request::route()->getName() != 'register')
                    <!--Header Extras-->
                    <div class="header-extras">
                        <ul>
                            @guest
                            <li><a href="{{ route('login') }}" class="btn bg-white text-dark btn-sm">Login</a></li>
                            <li class="ml-1" style="margin-left: 5px"><a href="{{ route('register') }}" class="btn btn-sm">Register</a></li>
                            @endguest
                            {{-- <li>
                                <div class="p-dropdown"> <a href="#"><i class="icon-globe"></i><span>EN</span></a>
                                    <ul class="p-dropdown-content">
                                        <li><a href="#">English</a></li>
                                    </ul>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                    <!--end: Header Extras-->
                    @endif

                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger"> <a class="lines-button x"><span class="lines"></span></a> </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            @auth
                            <nav>
                                <ul>
                                    <li><a href="{{ route('pricingplan') }}">Companies</a></li>
                                    <li><a href="{{ route('quotation') }}">Quik Quote</a></li>
                                    <li><a href="{{ route('welcome') }}">Reports</a></li>
                                    <li><a href="{{ route('welcome') }}">Tech Support</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ’s</a></li>
                                    <li>
                                        <div class="p-dropdown"><a href="#">
                                            <span style="border-radius: 50%"><i class="icon-user fa-2x"></i>{{ Auth::user()->name }}</span>
                                        </a>
                                            <ul class="p-dropdown-content">
                                                <li><a href="{{ route('user.profile') }}">Profile</a></li>
                                                <li><a href="{{ route('home') }}">Dashboard</a></li>
                                                {{-- <li><a href="#">Logout</a></li> --}}
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                                        <i class="ni ni-user-run"></i>
                                                        <span>Logout</span>
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                            @endauth
                        </div>
                    </div>
                    <!--end: Navigation-->
                </div>
            </div>
        </header>
        <!-- end: Header -->

        @yield('content')

        <!-- Footer -->
        <footer id="footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="widget">

                                <div class="widget-title">HOME INSPECTION</div>
                                <p class="mb-5">All rights reserved.
                                    Copyright © 2022. LOGO.</p>
                                {{-- <a href="#"
                                    class="btn btn-inverted" target="_blank">Purchase Now</a> --}}
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Discover</div>
                                        <ul class="list">
                                            <li><a href="#">Features</a></li>
                                            <li><a href="#">Layouts</a></li>
                                            <li><a href="#">Corporate</a></li>
                                            <li><a href="#">Updates</a></li>
                                            <li><a href="{{ route('pricingplan') }}">Pricing</a></li>
                                            <li><a href="#">Customers</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Features</div>
                                        <ul class="list">
                                            <li><a href="#">Layouts</a></li>
                                            <li><a href="#">Headers</a></li>
                                            <li><a href="#">Widgets</a></li>
                                            <li><a href="#">Footers</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Pages</div>
                                        <ul class="list">
                                            <li><a href="#">Portfolio</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Shop</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Support</div>
                                        <ul class="list">
                                            <li><a href="{{ route('contactus') }}">Help Desk</a></li>
                                            <li><a href="#">Documentation</a></li>
                                            <li><a href="{{ route('contactus') }}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; 2022 LOGO - All Rights Reserved.<a href="#" target="_blank" rel="noopener">
                            ANYSOLUTIONS.NET</a> </div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->

    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>

    <!--Template functions-->
    <script src="{{ asset('frontend/assets/js/functions.js') }}"></script>
    @yield('script')
</body>

</html>
