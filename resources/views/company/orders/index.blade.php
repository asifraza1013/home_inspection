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
                    {!! Form::open(['route' => 'order.list', 'method'=>'get']) !!}
                        <div class="form-group mb-0">
                        <select name="order" id="" class="form-control form-control-sm">
                            <option value="">All</option>
                            <option value="unapproved">Unapproved</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    {!! Form::close() !!}
                </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Verified at</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($orders as $order)
                                        <tr>{{  }}</tr>
                                    @endforeach
                                </tbody>
                                <tfoot >
                                <tr>
                                    <td colspan="6">
                                        {{$orders->links()}}
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
