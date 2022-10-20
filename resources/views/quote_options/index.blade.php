@extends('layouts.app')
@push('pg_btn')
@can('create-user')
    <a href="{{ route('users.create') }}" class="btn btn-sm btn-neutral">Create New User</a>
@endcan
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-header bg-transparent">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="mb-0">All Users</h3>
                    </div>
                    <div class="col-lg-4">
                {!! Form::open(['route' => 'users.index', 'method'=>'get']) !!}
                    <div class="form-group mb-0">
                    {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Search users']) }}
                </div>
                {!! Form::close() !!}
            </div>
                </div>
            </div>
            <div class="card-body p-0">
            </div>
        </div>
    </div>
</div>
@endsection
