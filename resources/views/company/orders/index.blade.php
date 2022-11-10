@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">Orders List</h3>
                        </div>
                        <div class="col-lg-4">
                            <form action="{{ route('order.list') }}" id="filter-form">
                                <div class="form-group mb-0">
                                    <select name="order" id="order-filter" class="form-control form-control-sm">
                                        <option value="">All</option>
                                        <option value="unapproved">Unapproved</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Inspection Date/time</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">email</th>
                                        <th scope="col">Contact No.</th>
                                        <th scope="col">Agent</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Square-fit</th>
                                        <th scope="col">Years</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Admin Approvel</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @if (count($orders))
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->inspection_date }}:{{ $order->inspection_time }}</td>
                                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                                <td>{{ $order->email }}</td>
                                                <td>{{ $order->contact_number }}</td>
                                                <td>{{ $order->agent->name }}</td>
                                                <td>{{ $order->company->company_name }}</td>
                                                <td>{{ $order->total_square }}</td>
                                                <td>{{ $order->total_years }}</td>
                                                <td>{{ currency($order->total) }}</td>
                                                <td>{!! $order->admin_approved
                                                    ? '<span class="badge badge-pill badge-lg badge-success">Approved</span>'
                                                    : '<span class="badge badge-pill badge-lg badge-warning">Pending</span>' !!}</td>
                                                <td><a class="btn btn-primary btn-sm m-1" data-toggle="tooltip"
                                                        data-placement="top" title="View and edit user details"
                                                        href="{{ route('order.detail', $order->id) }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">No Record Found!</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            {{ $orders->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#order-filter').on('change', function() {
                $('#filter-form').submit();
            })
        });
    </script>
@endsection
