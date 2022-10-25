@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.quote.options.update') }}" method="POST">
                        @csrf
                        <div class="row quotation">
                            @foreach ($quoteOptions->detail['name'] as $key => $item)
                                <div class="col-lg-3 option-{{ $key }}">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name[]"
                                        placeholder="Enter Quotation Option Name" required=""
                                        value="{{ $item }}">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Price</label>
                                    <input type="text" class="form-control" name="price[]" placeholder="Enter Price"
                                        required="" value="{{ $quoteOptions->detail['price'][$key] }}">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Type</label>
                                    <select name="type[]" id="" class="form-control" required>
                                        <option disabled selected>-- Select --</option>
                                        <option value="1"
                                            {{ $quoteOptions->detail['type'][$key] == 1 ? 'selected' : null }}>Mendatory
                                        </option>
                                        <option value="2"
                                            {{ $quoteOptions->detail['type'][$key] == 2 ? 'selected' : false }}>Optional
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Visible To User</label>
                                    <select name="visibility[]" id="" class="form-control" required>
                                        <option disabled selected>-- Select --</option>
                                        <option value="1"
                                            {{ $quoteOptions->detail['visibility'][$key] == 1 ? 'selected' : null }}>Show
                                        </option>
                                        <option value="2"
                                            {{ $quoteOptions->detail['visibility'][$key] == 2 ? 'selected' : false }}>Hide
                                        </option>
                                    </select>
                                </div>
                                <input type="hidden" name="quotation" value="{{$quoteOptions->id}}">
                            @endforeach
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success btn-sm btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            console.log('document ready');
            $('.add-new-option').on('click', function() {
                console.log('clicked');
                var html = '<div class="col-lg-4">\
                                            <label for="">Name</label>\
                                            <input type="text" class="form-control" name="name[]" placeholder="Enter Quotation Option Name" required="" value="">\
                                        </div>\
                                        <div class="col-lg-3">\
                                            <label for="">Price</label>\
                                            <input type="text" class="form-control" name="price[]" placeholder="Enter Price" required="" value="">\
                                        </div>\
                                        <div class="col-lg-3">\
                                            <label for="">Type</label>\
                                            <select name="type" id="" class="form-control" required>\
                                                <option disabled selected>-- Select --</option>\
                                                <option value="1">Mendatory</option>\
                                                <option value="2">Optional</option>\
                                            </select>\
                                        </div>\
                                        <div class="col-lg-2">\
                                            <button type="button" class="btn btn-danger">Remove</button>\
                                        </div>';
                $('.quotation').append(html)
            })
        });
    </script>
@endsection
