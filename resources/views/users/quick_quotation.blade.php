@extends('layouts.app')
@section('content')

    <section>
        <div class="container">
            <div class="row h-auto">
                <div class="col-lg-5">
                    <div class="card rounded-0">
                        <div class="card-body get-quote">
                            @include('includes.quotation_block')
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-1">
                    <img src="{{ asset('frontend/assets/images/site/faq.png') }}" alt=""
                        class="img-fluid m-b-40 w-75" style="border: 2px solid #0A2FB6">
                    <a href="{{ route('companies.list') }}" class="btn btn-primary btn-sm btn-block w-75 mt-2">Companies list</a>
                </div>
            </div>
        </div>
    </section>
@endsection
