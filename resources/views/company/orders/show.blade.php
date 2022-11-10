@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Inspection Date</label>
                            <h5 class="text-mute">{{ $order->inspection_date }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Inspection Time</label>
                            <h5 class="text-mute">{{ $order->inspection_time }}</h5>
                        </div>

                        <div class="col-12"><hr></div>

                        <div class="col-lg-6">
                            <label for="">User Name</label>
                            <h5 class="text-mute">{{ $order->first_name.' '.$order->last_name }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Email</label>
                            <h5 class="text-mute">{{ $order->email }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Contact Number</label>
                            <h5 class="text-mute">{{ $order->contact_number }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">City</label>
                            <h5 class="text-mute">{{ $order->city }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Area</label>
                            <h5 class="text-mute">{{ $order->area }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Zipcode</label>
                            <h5 class="text-mute">{{ $order->zip_code }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Address</label>
                            <h5 class="text-mute">{{ $order->address }}</h5>
                        </div>

                        <div class="col-12"><hr></div>

                        <div class="col-lg-6">
                            <label for="">Agent</label>
                            <h5 class="text-mute">{{ $order->agent->name }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Comapny</label>
                            <h5 class="text-mute">{{ $order->company->company_name }}</h5>
                        </div>

                        <div class="col-12"><hr></div>

                        <div class="col-lg-6">
                            <label for="">Squarefit</label>
                            <h5 class="text-mute">{{ ($order->square_amount/$order->total_square) .' X '. $order->total_square .' = '. $order->square_amount }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Total Years</label>
                            <h5 class="text-mute">{{ ($order->year_amount/$order->total_years) .' X '. $order->total_years .' = '. $order->year_amount }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Services Fee</label>
                            <h5 class="text-mute">{{ currency(($order->total) - ($order->total_square + $order->total_years)) }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Services List</label>
                            <ul>
                                <div class="row">
                                    @foreach ($order->item_selection as $key=>$item)
                                        <div class="col-lg-6">
                                            <li>{{ $item.'  '.currency($order->item_prices[$key]) }}</li>
                                        </div>
                                    @endforeach
                                </div>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Grand Total</label>
                            <h5 class="text-mute">{{ currency($order->total) }}</h5>
                        </div>

                        <div class="col-12"><hr></div>
                        <div class="col-lg-6">
                            <label for="">Admin Approvel</label>
                            <h5 class="text-mute">{!! $order->admin_approved
                                ? '<span class="badge badge-pill badge-lg badge-success">Approved</span>'
                                : '<span class="badge badge-pill badge-lg badge-warning">Pending</span>
                                <span class="ml-4"><a href='.route('order.approve', $order->id).' class="btn btn-sm btn-primary">Approve Order</a></span>' !!}

                            </h5>
                        </div>

                        <div class="col-lg-6">
                            <label for="">Order Status</label>
                            <h5 class="text-mute"><span class="badge badge-pill badge-lg badge-success">{{ config('constants.order_status.'.$order->status) }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
