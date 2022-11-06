@extends('frontend.layouts.layouts')

@section('content')
    <section id="page-title" class="text-light"
        style="background-image: url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}'); padding: 45px 0;">
        <div class="container">
            <div class="page-title">
                <h1 class="bold">Comapnies</h1>
            </div>
        </div>
    </section>
    <section class="company-banner" style="background-color: #4F8073; color:white !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="bolder text-white">Booking an inspection is easy and convenient.</h1>
                    <h3 class="mt-2 text-white">FEATURES</h3>

                    <div class="feature-list text-white">
                        <h5><span class="my-auto ml-2" style="margin-left: 10px"><span class="cirlcle"></span> Quick
                                Response & 24-hour Turnaround</span></h5>
                        <h5><span class="my-auto ml-2" style="margin-left: 10px"><span class="cirlcle"></span>Detailed,
                                Thorough Reports</span></h5>
                        <h5><span class="my-auto ml-2" style="margin-left: 10px"><span class="cirlcle"></span>Competitive
                                Pricing/span></h5>
                        <h5><span class="my-auto ml-2" style="margin-left: 10px"><span class="cirlcle"></span>Honest,
                                Unbiased Inspectors</span></h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('frontend/assets/images/about/profile 1.png') }}" class="w-75" alt="">
                    <div class="buttons mt-2 w-75 text-center">
                        <div class="group">
                            <a href="{{ route('quotation') }}" class="btn btn-primary btn-small rounded-0">Get Quote</a>
                            <button class="btn btn-primary btn-small rounded-0">&nbsp &nbsp Hire &nbsp &nbsp </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Table Default -->
    <section id="content">
        <div class="container">
            <!-- Pricing Table -->
            <div class="heading-text text-center pb-1">
                <h4 class="text-dgreen">Here are some of the best Companies Recommended for you</h4>
            </div>

            <div class="input-group">
                <div class="form-outline w-75">
                    <form action="{{ route('companies.list') }}" id="company-search-form">
                        <input type="search" id="form1" name="search" class="form-control rounded-0"
                            placeholder="Search best company for you" />
                    </form>
                </div>
                <button type="button" class="btn btn-primary rounded-0 search-company" style="width: 15%">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <div class="companies-list mt-3 mt-lg-5">
                <div class="row">
                    @foreach ($compnies as $item)
                        <div class="col-lg-10 mt-2 mt-lg-4">
                            <div class="row">
                                <div class="col-2"><img class="w-100"
                                        src="{{ $item->user->profile_photo ? $item->user->profile_photo : asset('frontend/assets/images/about/profile 1.png') }}"
                                        alt=""></div>
                                <div class="col-6">
                                    <h2><a class="link" href="{{ route('companies.detail', Crypt::encrypt($item->id)) }}">{{ $item->company_name }}</a></h2>
                                    <p>{!! Str::limit($item->description, 200) !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 m-auto">
                            <div class="group">
                                <a href="{{ route('quotation', $item->id) }}"
                                    class="btn btn-primary btn-small rounded-0 btn-block">Get Quote</a>
                                <a href="{{ route('companies.hiring.form', Crypt::encrypt($item->id)) }}" class="btn btn-primary btn-small rounded-0 btn-block">Hire</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="list mt-lg-5 mt-2">
                {{ $compnies->links() }}
            </div>
        </div>
    </section>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.search-company').on('click', function () {
            $('#company-search-form').submit();
        })
    });
</script>
@endsection
