@extends('frontend.layouts.layouts')

@section('content')
    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider slider-halfscreen dots-creative" data-height-xs="360" data-autoplay="5000"
        data-animate-in="fadeIn" data-animate-out="fadeOut" data-items="1" data-loop="true" data-autoplay="true">
        <!-- Slide 1 -->
        <div class="slide" data-bg-image="{{ asset('frontend/assets/images/homepages/construction/images/1.jpg') }}">
            <div class="container">
                <div class="slide-captions text-start">
                    <!-- Captions -->
                    <h2 class="text-medium m-b-50">
                        <span style="padding:20px;" class="text-light bg-mblue d-block d-md-none"> Home Inspection Services</span>
                    </h2>
                    <p class="lead  text-light">
                        We offer a range of services for
                        <br /> both businesses and individuals companies,
                        <br /> Beautiful nature, and rare feathers!. Morbi sagittis,
                        <br /> sem quis lacinia faucibus, orci ipsum
                        <br /> gravida tortor.
                    </p>
                    <a class="btn btn-light bg-mblue"
                        href="#">Quik Quote </a>

                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 1 -->
        <!-- Slide 2 -->
        <div class="slide" data-bg-image="{{ asset('frontend/assets/images/homepages/construction/images/2.jpg') }}">
            <div class="container">
                <div class="slide-captions text-start">
                    <!-- Captions -->
                    <h2 class="text-medium m-b-50">
                        <span style="padding:20px;" class="text-light bg-mblue d-block d-md-none"> Home Inspection Services </span>
                    </h2>
                    <p class="lead text-light">Lorem ipsum dolor sit amet, consecte adipiscing elit.
                        <br /> Suspendisse condimentum porttitor cursumus.
                    </p>
                    <a class="btn btn-light bg-mblue"
                        href="#">Quik Quote</a>

                    <!-- end: Captions -->
                </div>
            </div>
        </div>
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
                    <p class="text-dgreen">Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but
                        also the leap into electronic typesetting, remaining essentially
                         unchanged.</p>
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
                    <p class="text-left text-light">Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but
                        also the leap into electronic typesetting, remaining essentially
                            unchanged.</p>
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
                    <p class="text-dgreen">Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type
                        specimen book. .</p>
                    <ul>
                        <li>Lorem Ipsum is simply dummy text of the printing .</li>
                        <li>typesetting industry. Lorem Ipsum has been the industry's. </li>
                        <li>printer took a galley of type and scrambled.  </li>
                        <li>specimen book. It has survived not only five centuries.  </li>
                        <li>standard dummy text ever since the 1500s.   </li>
                        <li>also the leap into electronic typesetting, remaining.  </li>
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
                    <p class="text-left text-light">Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type
                        specimen book. </p>
                        <ul>
                            <li>Lorem Ipsum is simply dummy text of the printing .</li>
                            <li>typesetting industry. Lorem Ipsum has been the industry's. </li>
                            <li>printer took a galley of type and scrambled.  </li>
                            <li>specimen book. It has survived not only five centuries.  </li>
                            <li>standard dummy text ever since the 1500s.   </li>
                            <li>also the leap into electronic typesetting, remaining.  </li>
                        </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40">
                <span class="lead text-mgreen">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
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
