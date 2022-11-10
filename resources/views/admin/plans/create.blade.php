@extends('layouts.app')
@push('pg_btn')
    <a href="{{ route('plans.index') }}" class="btn btn-sm btn-neutral">All Plans</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => 'plans.store', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Stripe Plan</label>
                                    <select name="stripe_plan" id="" class="form-control">
                                        <option value="" disabled selected>Select Strip Plan</option>
                                        @foreach ($plans as $plan)
                                            <option value="{{ $plan->id }}">{{ $plan->product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" name="description" class="form-control"
                                        value="{{ old('description') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row category-row">
                            <div class="col-lg-6 mt-1">
                                <div class="input-group h-100">
                                    <input type="text" class="form-control" name="features[]" placeholder=""
                                        value="">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <p class="">Click to <a href="#"><strong class="text-mblue" id="add-category">Add<i class="icon-plus-circle fa-1x"></i></strong></a> plan features...</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" class="form-control" name="price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="status" value="1" class="custom-control-input"
                                        id="status">
                                    {{ Form::label('status', 'Status', ['class' => 'custom-control-label']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                {{ Form::submit('Submit', ['class' => 'mt-5 btn btn-primary']) }}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#uploadFile').filemanager('file');

            $('#add-category').on('click', function() {
                console.log('addNewItem');
                let html =
                    '<div class="col-lg-6 mt-1">\
                                <div class="input-group h-100">\
                                    <input type="text" class="form-control" name="features[]" placeholder="" value=""> </div>\
                            </div>';
                $('.category-row').append(html);
            })
        })
    </script>
@endsection
