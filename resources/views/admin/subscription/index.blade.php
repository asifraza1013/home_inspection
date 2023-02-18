@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-header bg-transparent">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="mb-0">All Subscriptions</h3>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div>
                        <table class="table table-hover align-items-center">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Plan Name</th>
                                <th scope="col">Plan Status</th>
                                <th scope="col">Subscription Date</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($subscriptions as $sub)
                                    <tr>
                                        <td>{{ $sub->email }}</td>
                                        <td>{{ $sub->name }}</td>
                                        <td>{{ $sub->stripe_status }}</td>
                                        <td>{{ $sub->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot >
                            <tr>
                                <td colspan="6">
                                    {{$subscriptions->links()}}
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
