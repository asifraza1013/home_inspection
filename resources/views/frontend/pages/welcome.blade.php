@extends('frontend.layouts.layouts')

<style>
    .opecity:{
        opacity: 0.6 !important;
    }
</style>
@section('content')
    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider slider-halfscreen dots-creative" data-height-xs="360" data-autoplay="5000"
        data-animate-in="fadeIn" data-animate-out="fadeOut" data-items="1" data-loop="true" data-autoplay="true">
        <!-- Slide 1 -->
        <div class="slide" data-bg-image="{{ asset('frontend/assets/images/site/banner.jpeg') }}" style="background-position: center;">
            <div class="container">
                <div class="slide-captions text-start">
                    <!-- Captions -->
                    <h2 class="text-medium m-b-50">
                        <span style="padding:20px;" class="text-light bg-mblue d-block d-md-none"> Home Inspection Services</span>
                    </h2>
                    <div class="w-lg-50 opecity rounded banner-text" style="background-color: hsl(0deg 0% 0%);padding: 15px;">
                        <p class="lead  text-light">
                            To get an instant quote for a Professional <br> Home Inspection or auxiliary service, <br> please fill out this quick and easy form and provide <br> the information for the most accurate quote
                        </p>
                    </div>
                    <a class="btn btn-light bg-mblue"
                        href="{{ route('quotation') }}">Quik Quote </a>

                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <div class="slide" data-bg-image="{{ asset('frontend/assets/images/site/banner3.jpeg') }}" style="background-position: center;">
            <div class="container">
                <div class="slide-captions text-start">
                </div>
            </div>
        </div>
        <div class="slide" data-bg-image="{{ asset('frontend/assets/images/site/banner1.jpeg') }}" style="background-position: center;">
            <div class="container">
                <div class="slide-captions text-start">
                </div>
            </div>
        </div>
        <!-- end: Slide 1 -->
        <!-- Slide 2 -->
        {{-- <div class="slide" data-bg-image="{{ asset('frontend/assets/images/site/login.png') }}" style="background-position: center;">
            <div class="container">
                <div class="slide-captions text-start">
                    <!-- Captions -->
                    <h2 class="text-medium m-b-50">
                        <span style="padding:20px;" class="text-light bg-mblue d-block d-md-none"> Home Inspection Services </span>
                    </h2>
                    <div class="w-lg-50" style="background-color: #1f4026; padding: 15px; opacity:0.6 !important;">
                        <p class="lead text-light">To get an instant quote for a Professional <br> Home Inspection or auxiliary service, <br> please fill out this quick and easy form and provide <br> the information for the most accurate quote</p>
                    </div>
                    <a class="btn btn-light bg-mblue"
                        href="{{ route('quotation') }}">Quik Quote</a>

                    <!-- end: Captions -->
                </div>
            </div>
        </div> --}}
        <!-- end: Slide 2 -->
    </div>
    <!--end: Inspiro Slider -->

    <section>
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40">
                <h2 class="text-dgreen">Hire best for your House</h2>
                <span class="lead text-mgreen">Professional home inspection company services.</span>
            </div>
            <div class="row h-100">
                <div class="col-lg-5">
                    <img alt="" class="img-fluid m-b-40 w-75" src="{{ asset('frontend/assets/images/site/house.png') }}">
                </div>
                <div class="col-7 my-auto">
                    <p class="text-dgreen">Home inspections are easy when you start with Sable Software Home Inspections. Home inspections are crucial when you are considering purchasing real estate and can also be a good idea if you are selling a home. Suppose you are putting a home on the market. In that case, Sable Software Home Inspectors can give you an idea of any issues your home may have, providing the opportunity to make necessary repairs and get you top-dollar in the selling process.</p>
                </div>
            </div>
        </div>
    </section>

    <section style="background-image:url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}');" class="bg-dark">
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40">
                <h2 class="text-light bold">Connect with Us!</h2>
                <span class="lead text-light">Connect with us as an agency.</span>
            </div>
            <div class="row h-auto">
                <div class="col-lg-5">
                    <img alt="" class="img-fluid m-b-40" src="{{ asset('frontend/assets/images/site/sound.png') }}">
                </div>
                <div class="col-lg-7 my-auto">
                    <div class="container">
                        <p class="text-left text-light">You can contact our home inspection company by sending us a message by clicking the button below. We’d love to help you with your property inspection needs, whether it’s a pre-existing or new home inspection, radon testing, or sewer line inspection.</p>
                    </div>
                    <a class="btn btn-light btn-lg bg-mblue" href="{{ route('contactus') }}">Connect with Us! </a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40">
                <h2 class="text-dgreen">Reports</h2>
                <span class="lead text-mgreen">Get report about youre house by your inspection company after every specific time period.</span>
            </div>
            <div class="row h-100">
                <div class="col-lg-5">
                    <img alt="" class="img-fluid m-b-40 w-75" src="{{ asset('frontend/assets/images/site/reports.png') }}">
                </div>
                <div class="col-7 my-auto text-dgreen">
                    <p class="text-dgreen">You’ll likely find a home inspection report broken down as follows; An informational section that lists general details about the house, like its square footage and construction date A table of contents A general summary that includes major issues with the house Details about major home systems, their crucial components, and their operability. You can expect a home inspector to include information about:</p>
                    <ul>
                        <li>Structural components like the foundation and framing of the home Exterior features like siding, porches, balconies, walkways, and driveways</li>
                        <li>Roof features like shingles, flashing, and skylights.</li>
                        <li>Plumbing systems like pipes, drains, and water heating equipment.</li>
                        <li>Electrical equipment like service panels, breakers, and fuses. </li>
                        <li>Heating and cooling systems.  </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section style="background-image:url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}');" class="bg-dark">
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40">
                <h2 class="text-light bold">Quik Quote!</h2>
                <span class="lead text-light">Get quik quote for your home by information.</span>
            </div>
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
                                    <div class="input-group h-100">
                                        <input type="text" class="form-control" name="" placeholder="Home Size:	">
                                        <span class="my-auto ml-2" style="margin-left: 10px"><input type="checkbox" class="form-check-input" id="vehicle1" name="vehicle1" value="Bike"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Townhouse:</label>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    <div class="input-group h-100">
                                        <input type="text" class="form-control" name="" placeholder="Townhouse:	">
                                        <span class="my-auto ml-2" style="margin-left: 10px"><input type="checkbox" class="form-check-input" id="vehicle1" name="vehicle1" value="Bike"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Condo:</label>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    <div class="input-group h-100">
                                        <input type="text" class="form-control" name="" placeholder="Condo:	">
                                        <span class="my-auto ml-2" style="margin-left: 10px"><input type="checkbox" class="form-check-input" id="vehicle1" name="vehicle1" value="Bike"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Age Fee:</label>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    <div class="input-group h-100">
                                        <input type="text" class="form-control" name="" placeholder="Age Fee:">
                                        <span class="my-auto ml-2" style="margin-left: 10px"><input type="checkbox" class="form-check-input" id="vehicle1" name="vehicle1" value="Bike"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Pool or Spa:</label>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    <div class="input-group h-100">
                                        <input type="text" class="form-control" name="" placeholder="Pool or Spa:">
                                        <span class="my-auto ml-2" style="margin-left: 10px"><input type="checkbox" class="form-check-input" id="vehicle1" name="vehicle1" value="Bike"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Termite:</label>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    <div class="input-group h-100">
                                        <input type="text" class="form-control" name="" placeholder="Termite:">
                                        <span class="my-auto ml-2" style="margin-left: 10px"><input type="checkbox" class="form-check-input" id="vehicle1" name="vehicle1" value="Bike"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Trip Charge:</label>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    <div class="input-group h-100">
                                        <input type="text" class="form-control" name="" placeholder="Trip Charge:">
                                        <span class="my-auto ml-2" style="margin-left: 10px"><input type="checkbox" class="form-check-input" id="vehicle1" name="vehicle1" value="Bike"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Re-Inspection:</label>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    <div class="input-group h-100">
                                        <input type="text" class="form-control" name="" placeholder="Re-Inspection:">
                                        <span class="my-auto ml-2" style="margin-left: 10px"><input type="checkbox" class="form-check-input" id="vehicle1" name="vehicle1" value="Bike"></span>
                                    </div>
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
                <div class="col-lg-7 my-auto text-light">
                    <p class="text-left text-light">To get an instant quote for a Professional Home Inspection or auxiliary service, please fill out this quick and easy form and provide the following information for the most accurate quote:</p>
                        <ul>
                            <li>Town of the property?</li>
                            <li>Square footage of the home? </li>
                            <li>Street address?  </li>
                            <li>Age of the home?  </li>
                            <li>Preferred inspection date if known?  </li>
                            <li>Pool or Spa?  </li>
                        </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40">
                <span class="lead text-mgreen">Defects And Our Works</span>
            </div>
            <div class="row">
                <div class="col-lg-3 col-xl-3 col-6">
                    <img src="{{ asset('frontend/assets/images/site/Rectangle3.png') }}" alt="" class="img-fluid m-b-40 w-100">
                </div>
                <div class="col-lg-3 col-xl-3 col-6">
                    <img src="{{ asset('frontend/assets/images/site/Rectangle4.png') }}" alt="" class="img-fluid m-b-40 w-100">
                </div>
                <div class="col-lg-3 col-xl-3 col-6">
                    <img src="{{ asset('frontend/assets/images/site/Rectangle1.png') }}" alt="" class="img-fluid m-b-40 w-100">
                </div>
                <div class="col-lg-3 col-xl-3 col-6">
                    <img src="{{ asset('frontend/assets/images/site/Rectangle2.png') }}" alt="" class="img-fluid m-b-40 w-100">
                </div>
                <div class="col-lg-3 col-xl-3 col-6">
                    <img src="{{ asset('frontend/assets/images/site/Rectangle5.png') }}" alt="" class="img-fluid m-b-40 w-100">
                </div>
                <div class="col-lg-3 col-xl-3 col-6">
                    <img src="{{ asset('frontend/assets/images/site/Rectangle6.png') }}" alt="" class="img-fluid m-b-40 w-100">
                </div>
                <div class="col-lg-3 col-xl-3 col-6">
                    <img src="{{ asset('frontend/assets/images/site/Rectangle7.png') }}" alt="" class="img-fluid m-b-40 w-100">
                </div>
                <div class="col-lg-3 col-xl-3 col-6">
                    <img src="{{ asset('frontend/assets/images/site/Rectangle8.png') }}" alt="" class="img-fluid m-b-40 w-100">
                </div>
            </div>
        </div>
    </section>
@endsection
