@extends('frontend.layouts.layouts')

<style>
    #myTab3 li {
        border: 1px solid #0A2FB6;
    }

    #myTab3 li a {
        color: #0A2FB6
    }

    #myTab3 {
        border-bottom: 1px solid #0A2FB6;
    }

    .tabs.tabs-folder .nav-tabs .nav-link.active {
        background: #0A2FB6;
        color: white !important;
        border: 0;
        border-radius: 0;
    }

    .tabs.tabs-folder .nav-tabs .nav-link.active a {
        color: white
    }

    .picture-container {
        position: relative;
        cursor: pointer;
        text-align: center;
    }

    .picture {
        width: 170px;
        height: 170px;
        background-color: #4F8073;
        border: 4px solid #0A2FB6;
        color: #FFFFFF;
        border-radius: 50%;
        margin: 5px auto;
        overflow: hidden;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
    }

    .picture-src {
        width: 100%;
        height: 100%;
    }

    .picture:hover {
        border-color: white;
    }

    .picture input[type="file"] {
        cursor: pointer;
        display: block;
        height: 100%;
        left: 0;
        opacity: 0 !important;
        position: absolute;
        top: 0;
        width: 100%;
    }




    .choice {
        text-align: center;
        cursor: pointer;
    }

    .choice input[type="radio"],
    .choice input[type="checkbox"] {
        position: absolute;
        left: -10000px;
        z-index: -1;
    }

    .choice .icon {
        text-align: center;
        vertical-align: middle;
        height: 106px;
        width: 106px;
        border-radius: 50%;
        color: #999999;
        margin: 5px auto;
        border: 4px solid #CCCCCC;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        overflow: hidden;
    }

    .choice .icon:hover {
        border-color: #4caf50;
    }

    .choice.active .icon {
        border-color: #2ca8ff;
    }

    .tab-content h4,
    .tab-content h5,
    .tab-content h6,
    .tab-content a,
    .tab-content label,
    .tab-content p,
    .tab-content span {
        color: #69BAA4
    }

    .tab-content label {
        font-size: 1rem;
    }
</style>
@section('content')
    <section id="page-title" class="text-light"
        style="background-image: url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}')">
        <div class="container">
            <div class="page-title">
                <h1 class="bold">User Profile!</h1>
                <span>Home inspections are easy when you start with WebsiteName Home Inspections. <br> Home inspections are
                    crucial when you are considering purchasing real estate and can also be a good idea if you are selling a
                    home.</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="active"><a href="">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section>
        <div class="space"></div>
        <div class="container">
            <div class="tabs tabs-folder" style="border: 1px solid #0A2FB6">
                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home3" role="tab"
                            aria-controls="home" aria-selected="true">personal information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile3" role="tab"
                            aria-controls="profile" aria-selected="false">Discription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact3" role="tab"
                            aria-controls="contact" aria-selected="false">Pricing</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact3" role="tab"
                            aria-controls="contact" aria-selected="false">Payment Details</a>
                    </li> --}}
                </ul>
                <div class="tab-content border-0 text-mgreen pb-0" id="myTabContent3">
                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab">
                        <form action="{{ route('company.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <input type="hidden" name="from" value="1">
                                    <div class="col-lg-3 text-center" style="border-right: 1px solid lightgray">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="{{ $user->profile_photo }}" class="picture-src"
                                                    id="wizardPicturePreview" title="" />
                                                <span><i class="icon-camera text-white fa-2x"></i></span>
                                                <input type="file" name="image" id="wizard-picture"
                                                    aria-invalid="false" class="valid" accept="image/*" />
                                            </div>
                                            <h5 class=""></h5>
                                        </div>
                                        <div class="name-container">
                                            <h5 class="bold text-mgreen">{{ $user->name }} <span class="icon-user"></span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <h4 class="bold">Edit Profile</h4>
                                        <hr class="bold text-mgreen">

                                        <div class="form-group mt-1">
                                            <label for="password">Compnay Name</label>
                                            <div class="input-group show-hide-password">
                                                <input class="form-input" name="company_name"
                                                    placeholder="Enter Company Name" type="text"
                                                    value="{{ $user->company ? $user->company->company_name : null }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label for="password">Email / Phone number</label>
                                            <div class="input-group show-hide-password">
                                                <input class="form-input" name="" placeholder="Enter Company Name"
                                                    type="text" value="{{ $user->email }}" required disabled>
                                            </div>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label for="password">New Password</label>
                                            <div class="input-group show-hide-password">
                                                <input class="form-input" name="password"
                                                    placeholder="Enter Password (optional)" type="password" value="">
                                            </div>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label for="password">Confirm Password</label>
                                            <div class="input-group show-hide-password">
                                                <input class="form-input" name="confirm_password"
                                                    placeholder="Please confirm your password" type="password"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-1">
                                <button type="submit"
                                    class="btn btn-primary bg-mblue text-white btn-block btn-small rounded-0">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{ route('company.profile.update') }}" method="POST">
                            @csrf
                            <div class="container">
                                <h4 class="bold">Add discription</h4>

                                <div class="description p-3"
                                    style="border: 1px solid lightgray; border-top: 0px; border-bottom: 2px solid #0A2FB6">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $user->company ? $user->company->description : null }}</textarea>
                                    {{-- <p>Home inspections are easy when you start with WebsiteName Home Inspections. Home
                                        inspections are crucial when you are considering purchasing real estate and can also
                                        be a good idea if you are selling a home. Suppose you are putting a home on the
                                        market. In that case, WebsiteName Home Inspectors can give you an idea of any issues
                                        your home may have, providing the opportunity to make necessary repairs and get you
                                        top-dollar in the selling process.</p>
                                    <p>You’ll likely find a home inspection report broken down as follows; An informational
                                        section that lists general details about the house, like its square footage and
                                        construction date A table of contents A general summary that includes major issues
                                        with the house Details about major home systems, their crucial components, and their
                                        operability. You can expect a home inspector to include information about:</p> --}}
                                </div>
                            </div>
                            <div class="space"></div>
                            <div class="form-group mt-1">
                                <button class="btn btn-primary bg-mblue text-white btn-block btn-small rounded-0">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade w-lg-75 m-auto" id="contact3"
                        role="tabpanel"aria-labelledby="contact-tab">
                        <form action="{{ route('company.pricing.update') }}" method="POST">
                            @csrf
                            <div class="container">
                                <input type="hidden" name="from" value="2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>
                                            <span>Price / Square Footage(per SF) : <input type="text"
                                                    class="form-control"
                                                    value="{{ $user->company ? $user->company->per_square : null }}"
                                                    placeholder="Price/Square Footage"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <span>price / Year Built(per Year) : <input type="text" class="form-control"
                                                value="{{ $user->company ? $user->company->per_year : null }}"
                                                placeholder="price/Year Built"></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="bold text-mgreen">
                            <div class="space"></div>
                            <div class="row h-auto category-row">
                                <div class="row" style="border-bottom: 1px solid lightgray">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-5 my-auto text-dark bold"><h5>Name</h5></div>
                                            <div class="col-5"><h5 class="text-dark">Price({{currency()}})</h5></div>
                                            <div class="col-2 text-left"><h5 class="text-dark">Selection</h5></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-5 my-auto text-dark bold"><h5>Name</h5></div>
                                            <div class="col-5"><h5 class="text-dark">Price{{currency()}}</h5></div>
                                            <div class="col-2"><h5 class="text-dark">Selection</h5></div>
                                        </div>
                                    </div>
                                </div>
                                @if ($user->company && $user->company->pricing)
                                    @foreach ($user->company->pricing['item_name'] as $key=>$item)
                                        <div class="col-lg-6 mt-2">
                                            <div class="row">
                                                <div class="col-5 my-auto"><input type="text" class="form-control" name="item_name[]" value="{{$item}}"></div>
                                                <div class="col-5"><input type="text" name="item_price[]" class="form-control"
                                                        value="{{ $user->company->pricing['item_price'][$key] }}">
                                                </div>
                                                <div class="col-2 mt-2"><input type="checkbox" class="form-check-input" name="item_selection[]" {{ (isset($user->company->pricing['item_selection'][$key]) && $user->company->pricing['item_selection'][$key] == 'on') ? 'checked' : null }}></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="space"></div>
                                <div class="mt-2">
                                    <p class="">Click to <a href="#" data-bs-target="#add-category"
                                            data-bs-toggle="modal"><strong class="text-mblue">Add<i
                                                    class="icon-plus-circle fa-1x"></i></strong></a> more category...</p>
                                </div>
                                <div class="form-group mt-1">
                                    <button class="btn btn-primary bg-mblue text-white btn-block btn-small rounded-0">Save
                                        changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="space"></div>
    </section>

    <div class="modal fade" id="add-category" tabindex="-1" role="modal" aria-labelledby="modal-label"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center text-mgreen" id="modal-label">Add new / Edite category...</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4"><label for="">Category name :</label></div>
                                    <div class="col-8"><input type="text" value="" id="new-item" name="item_name[]" class="form-control">
                                    </div>
                                    <div class="col-4 mt-1"><label for="">Set Price :</label></div>
                                    <div class="col-8 mt-1"><input type="text" id="new-item-price" name="item_price[]" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary bg-mblue btn-block btn-small rouded-0 save-new-item" class="btn-close" data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#wizard-picture").on('change', function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.save-new-item').on('click', function(){
            console.log('addNewItem');
            let newItemName = $('#new-item').val();
            let newItemPrice = $('#new-item-price').val();
            let html = '<div class="col-lg-6 mt-2">\
                                            <div class="row">\
                                                <div class="col-5 my-auto"><input type="text" class="form-control" name="item_name[]" value="'+newItemName+'"></div>\
                                                <div class="col-5"><input type="text" name="item_price[]" class="form-control"\
                                                        value="'+newItemPrice+'">\
                                                </div>\
                                                <div class="col-2 mt-2"><input type="checkbox" class="form-check-input" name="item_selection[]"></div>\
                                            </div>\
                                        </div>';
            $('.category-row').append(html);
        })
    </script>
@endsection
